<?php

require_once ("WebSitePadrao.php");
class WebSite extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "principal";
    }

    protected function getDadosPaginaAtual(){
        return "<h1>Pagina Principal Site</h1>";
    }

}

new WebSite();
