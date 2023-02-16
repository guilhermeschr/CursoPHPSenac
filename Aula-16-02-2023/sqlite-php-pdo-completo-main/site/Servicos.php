<?php

require_once ("WebSitePadrao.php");
class Servicos extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "servico";
    }

    protected function getDadosPaginaAtual(){
        return "<h1>Pagina Servicos</h1>";
    }
}

new Servicos();
