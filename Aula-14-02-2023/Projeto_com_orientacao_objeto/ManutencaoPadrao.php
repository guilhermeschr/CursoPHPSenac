<?php
require_once 'conexao.php';
abstract class ManutencaoPadrao{

    protected function processaDados(){
        if(isset($_POST["acao"])) {
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
            }
        } else {
            echo json_encode(array("mensagem" => "Funcao invalida!"));
        }
    }
}