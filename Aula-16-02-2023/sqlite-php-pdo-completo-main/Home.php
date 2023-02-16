<?php

require_once ("ConsultaPadrao.php");
class Home extends ConsultaPadrao {
    
    protected function validaLogin() {
        $logado = isset($_GET["login"]) ? $_GET["login"] : true;
        if($logado == "USUARIO_LOGADO" || $logado){
            return true;
        }
    
        return false;
    }
    
    protected function getColunasTabela() {
        // TODO: Implement getColunasTabela() method.
    }
    
    protected function getModalDados() {
        // TODO: Implement getModalDados() method.
    }
    
    protected function getColunasCabecalhoTabela() {
        // TODO: Implement getColunasCabecalhoTabela() method.
    }
    
    protected function getAcoesInclusao() {
        return "";
    }
    
    protected function getNomeTabela() {
        return 'Bem vindo!<br> sistema de compras!';
    }
    
    protected function getColunasConsultaTabela() {
        // TODO: Implement getColunasConsultaTabela() method.
    }

    protected function getFiltrosConsulta() {
        return "";
    }

    protected function getScriptFooter(){
        return '';
    }
    
    protected function getHeaders(){
        return "<header class=\"header\">
                    <ul class=\"menu\">
                        <li><a href='site/WebSite.php' target='_blank'>Site</a></li>
                        <li><a href='login.php' target='_blank'>Sistema</a></li>
                    </ul>
                </header>";
    }
}

new Home();
