<?php

require_once ("WebSitePadrao.php");
class EntrarWebSite extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "usuario";
    }

    protected function getDadosPaginaAtual(){
        return "<h1>Pagina Entrar no site</h1>";
    }
}

new EntrarWebSite();
