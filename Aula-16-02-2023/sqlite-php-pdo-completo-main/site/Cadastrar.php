<?php

require_once ("WebSitePadrao.php");
class Cadastrar extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "usuario";
    }

    protected function getDadosPaginaAtual(){
        return "<h1>Pagina Cadastrar Usuario 1515</h1>";
    }
}

new Cadastrar();
