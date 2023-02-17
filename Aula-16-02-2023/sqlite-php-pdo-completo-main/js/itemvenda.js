const openModalVenda = () => document.getElementById('modal-produtos-venda')
.classList.add('active');

const closeModalVenda = () => {
    document.getElementById('modal-produtos-venda').classList.remove('active');

    consultarDados();
};

function openModalConfirmacao (itemvenda_id, venda_id, produto) {
    document.getElementById('modal-confirmacao')
        .classList.add('active');

    document.querySelector("#mensagem").innerHTML = `Deseja realmente excluir o item ${produto} da venda?`;
}

const closeModalConfirmacao = () => {
    document.getElementById('modal-confirmacao').classList.remove('active');
};

function detalharVenda(venda_id){
    const venda = {
        venda_id:venda_id
    };

    var oDados = {"funcao":"loadAjaxUpdateRegistro", "venda": JSON.stringify(venda), "acao" : "DETALHAR_VENDA"};

    $.ajax({
        url:"ajax_venda_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            console.log("Retorno Consulta-Item Venda(AJAX):" + JSON.stringify(response));

            const aDados = JSON.parse(response);

            openModalVenda();

            consultarDadosItemVenda(aDados);
        }
    })
}

function consultarDadosItemVenda(aDados){
    clearTableItemVenda();

    aDados.forEach(createRowItemVenda);
}

const clearTableItemVenda = () => {
    const rows = document.querySelectorAll('#tableDadosItemVenda>tbody tr');
    rows.forEach(row => row.parentNode.removeChild(row));
};

const createRowItemVenda = (itemvenda, index) => {
    const newRow = document.createElement('tr');

    const totalItem = parseFloat(itemvenda.preco_venda) * parseInt(itemvenda.quantidade);
    const lucroLiquido = totalItem - parseFloat(itemvenda.preco_custo) * parseInt(itemvenda.quantidade);
    newRow.innerHTML = `
        <td>${itemvenda.produto}</td>
        <td>${itemvenda.quantidade}</td>
        <td>${itemvenda.preco_custo}</td>
        <td>${itemvenda.preco_venda}</td>
        <td>${lucroLiquido}</td>
        <td>${totalItem}</td>
        <td>
            <button type="button" class="button red" onclick="excluirItemVenda(${itemvenda.itemvenda_id}, ${itemvenda.venda_id}, '${itemvenda.produto}')">Excluir</button>
        </td>
    `;

    document.querySelector('#tableDadosItemVenda>tbody').appendChild(newRow);
};

var ITEM_VENDA = 0;
var PRODUTO_VENDA = "";
var VENDA = "";
function excluirItemVenda(itemvenda_id, venda_id, produto){

    ITEM_VENDA    = itemvenda_id;
    PRODUTO_VENDA = produto;
    VENDA         = venda_id;

    openModalConfirmacao(itemvenda_id, venda_id, produto);
}

function executaExclusaoItemVenda(){
    const itemvenda_id = ITEM_VENDA;
    const venda_id     = VENDA;
    const produto      = PRODUTO_VENDA;

    console.log('itemvenda _id:' + itemvenda_id + " venda_id:" + venda_id);

    const venda = {
        itemvenda_id: itemvenda_id,
        venda_id: venda_id
    };

    var oDados = {
        "funcao":"loadAjaxUpdateRegistro",
        "acao": "EXECUTA_EXCLUSAO_ITEM_VENDA",
        "venda": JSON.stringify(venda),
    };

    $.ajax({
        url:"ajax_venda_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            console.log("Retorno Exclusao-Item Venda(AJAX):" + JSON.stringify(response));

            const aDados = JSON.parse(response);

            if(aDados.length > 0){
                consultarDadosItemVenda(aDados);
            } else {
                closeModalVenda();
            }
        }
    })
}

document.getElementById('modalCloseVenda')
.addEventListener('click', closeModalVenda);

document.getElementById('cancelarItemVenda')
.addEventListener('click', closeModalVenda);

document.getElementById('modalCloseConfirmacao')
.addEventListener('click', closeModalConfirmacao);

document.getElementById('modal-confirmacao')
.addEventListener('click', closeModalConfirmacao);

document.getElementById('confirmaModalConfirmacao')
.addEventListener('click', executaExclusaoItemVenda);

