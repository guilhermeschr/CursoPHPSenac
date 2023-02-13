<?php

function testarAjax(){
    echo json_encode($_POST);
}

if (isset($_POST["acao"])) {
    $acao = $_POST["acao"];

    switch ($acao) {
        case "EXECUTA_CONSULTA":
            executaConsulta();
            break;
        case "EXECUTA_INCLUSAO":
            executaInclusao();
            break;
        case "EXECUTA_ALTERACAO":
            executaAlteracao();
            break;
        case "BUSCA_DADOS_ALTERACAO":
            buscaDadosAlteracao();
            break;
        case "EXECUTA_EXCLUSAO":
            executaExclusao();
            break;
        case "TESTAR_AJAX":
            testarAjax();
            break;
        default:
            echo json_encode(array("mensagem" => "Acao invalida!"));
        break;
    }
} else {
    echo json_encode(array("mensagem" => "Acao invalida!"));
}
