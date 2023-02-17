'use strict';

const openModal = () => document.getElementById('modal')
    .classList.add('active');

const closeModal = () => {
    document.getElementById('modal').classList.remove('active');
};

const isValidFields = () => {
    return document.getElementById('form').reportValidity()
};

const clearFields = () => {
    const fields = document.querySelectorAll('.modal-field');
    fields.forEach(field => field.value = "");
    document.getElementById('id').dataset.index = 'new'
};

const saveRegistro = () => {
    if (isValidFields()) {
        const index = document.getElementById('id').dataset.index;
        if (index == 'new') {
            const venda = {
                cliente: document.getElementById('cliente').value,
                formapagamento: document.getElementById('formapagamento').value,
                total: document.getElementById('total').value
            };

            updateRegistroAjax(venda, "INCLUSAO");
        } else {
            const venda = {
                venda_id:document.getElementById('id').value,
                cliente: document.getElementById('cliente').value,
                formapagamento: document.getElementById('formapagamento').value,
                total: document.getElementById('total').value
            };

            updateRegistroAjax(venda, "ALTERACAO");
        }

        closeModal();
    }
};

const createRow = (venda, index) => {
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${venda.venda_id}</td>
        <td>${venda.cliente}</td>
        <td>${venda.formapagamento}</td>
        <td>${venda.total}</td>
        <td>
            <button type="button" class="button red" onclick="excluirVenda(${venda.venda_id})">Excluir</button>
            <button type="button" class="button green" onclick="detalharVenda(${venda.venda_id})">Detalhes</button>
        </td>
    `;

    document.querySelector('#tableVenda>tbody').appendChild(newRow);
};

const clearTable = () => {
    const rows = document.querySelectorAll('#tableVenda>tbody tr');
    rows.forEach(row => row.parentNode.removeChild(row));
};

const fillFields = (venda) => {
    document.getElementById('venda_id').value       = venda.venda_id;
    document.getElementById('cliente').value        = venda.cliente;
    document.getElementById('formapagamento').value = venda.formapagamento;
    document.getElementById('total').value          = venda.total;
    document.getElementById('venda_id').dataset.index = venda.index;
};

function excluirVenda (venda_id){
    const venda = {
        venda_id:venda_id
    };

    const response = confirm(`Deseja realmente excluir a venda ${venda_id}`);
    if (response) {
        loadAjaxUpdateRegistro (venda, "EXCLUSAO");
    }
};

function loadAjaxConsulta (funcao){
    var oDados = {"funcao":funcao};
    $.ajax({
        url:"ajax_venda_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            const aDados = JSON.parse(response);

            clearTable();

            aDados.forEach(createRow);
        }
    })
}

function loadAjaxUpdateRegistro (venda, acao){

    var oDados = {"funcao":"loadAjaxUpdateRegistro", "venda": JSON.stringify(venda), "acao" : acao};

    $.ajax({
        url:"ajax_venda_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            console.log("Retorno Consulta-Venda(AJAX):" + JSON.stringify(response));
            consultarDados();
        }
    })
}

function loadRegistros(Client, Key){
    updateTable();
}


const consultarDados = () => {
    localStorage.setItem("db_venda", "[]");

    loadAjaxConsulta("listarRegistros");
};

const updateRegistroAjax = (Client, acao) => {
    localStorage.setItem("db_venda", "[]");

    loadAjaxUpdateRegistro (Client, acao);
};

// Eventos
document.getElementById('cadastrarVenda')
.addEventListener('click', openModal);

document.getElementById('modalClose')
.addEventListener('click', closeModal);

document.getElementById('salvar')
.addEventListener('click', saveRegistro);

document.getElementById('cancelar')
.addEventListener('click', closeModal);

document.getElementById('limparDados')
.addEventListener('click', clearTable);

document.getElementById('consultarDados')
.addEventListener('click', consultarDados);
