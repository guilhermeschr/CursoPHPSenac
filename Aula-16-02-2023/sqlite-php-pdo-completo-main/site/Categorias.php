<?php

require_once ("WebSitePadrao.php");
class Categorias extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "servico";
    }
}

new Categorias();
