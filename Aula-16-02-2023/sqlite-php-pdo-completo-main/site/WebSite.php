<?php

require_once ("WebSitePadrao.php");
class WebSite extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "principal";
    }

}

new WebSite();
