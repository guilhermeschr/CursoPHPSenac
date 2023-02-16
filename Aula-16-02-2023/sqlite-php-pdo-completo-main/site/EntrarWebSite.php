<?php

require_once ("WebSitePadrao.php");
class EntrarWebSite extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "usuario";
    }
}

new EntrarWebSite();
