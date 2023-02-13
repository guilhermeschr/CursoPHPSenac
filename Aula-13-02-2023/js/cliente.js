function excluirCliente(cliente_id){
    console.log('Cliente id:' + cliente_id);
    const cliente = {
        cliente_id: cliente_id
    };

    loadAjaxUpdateRegistro(cliente, "EXECUTA_EXCLUSAO");
}

function loadAjaxUpdateRegistro (oDados, acao){

    var oDados = {"cliente": JSON.stringify(oDados),
                  "acao" : acao};

    $.ajax({
        url:"ajax_cliente_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            console.log("dados enviados:" + response);

            // Atualiza a consulta
            loadAjaxConsulta();
        }
    })
}

function loadAjaxConsulta(){
    var oDados = {"acao":"EXECUTA_CONSULTA"};
    $.ajax({
        url:"ajax_cliente_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){
            const aDados = JSON.parse(response);

            console.log("Retorno Consulta(AJAX):" + JSON.stringify(aDados));

            clearTable();

            aDados.forEach(createRow);
        }
    })
}

const clearTable = () => {
    const rows = document.querySelectorAll('#tableDados>tbody tr');
    rows.forEach(row => row.parentNode.removeChild(row));
};

const createRow = (cliente, index) => {
    const newRow = document.createElement('tr');


    // $cliente_id = $aContato["cliente_id"];
    //         $nome       = $aContato["nome"];
    //         $telefone   = $aContato["telefone"];
    //         $email      = $aContato["email"];
    //         $cidade     = $aContato["cidade"];

    newRow.innerHTML = `
        <td>${cliente.cliente_id}</td>
        <td>${cliente.nome}</td>
        <td>${cliente.telefone}</td>
        <td>${cliente.email}</td>
        <td>${cliente.cidade}</td>
        <td>
            <button type="button" class="button green" onclick="editarCliente(${cliente.cliente_id})">Editar</button>
        </td>
        <td>
            <button type="button" class="button red" onclick="excluirCliente(${cliente.cliente_id})">Excluir</button>
        </td>
    `;
    document.querySelector('#tableDados>tbody').appendChild(newRow);
};


function editarCliente(cliente_id) {
    console.log('Cliente id:' + cliente_id);

    // console.log("Buscando dados para alteracao do registro...");

    const cliente = {
        cliente_id: cliente_id
    };

    var oDados = {"cliente": JSON.stringify(cliente),
                  "acao" : "BUSCA_DADOS_ALTERACAO"
                };

    $.ajax({
        url:"ajax_cliente_aula.php",
        type:"POST",
        async:true,
        data: oDados,
        success:function(response){

            console.log("dados retornados:" + response);

            // Carrega os dados na tela
            const oCliente = JSON.parse(response);

            oCliente.id = oCliente.cliente_id;

            // debugger;

            carregaCampos(oContato);

            // Abre o Modal
            openModal();
        }
    })
}

const carregaCampos = (oCliente) => {
    document.getElementById('id').value        = oCliente.cliente_id;
    document.getElementById('nome').value      = oCliente.nome;
    // document.getElementById('sobrenome').value = oContato.sobrenome;
    // document.getElementById('endereco').value  = oContato.endereco;
    document.getElementById('telefone').value  = oCliente.telefone;
    document.getElementById('email').value     = oCliente.email;
    document.getElementById('cidade').value= oCliente.cidade;
    document.getElementById('nome').dataset.index = oCliente.index;
};

const openModal = () => {
    document.getElementById('modal').classList.add('active');
    document.getElementById('modal-footer').classList.add('active');
};

const closeModal = () => {
    //clearFields();
    document.getElementById('modal').classList.remove('active');
};
