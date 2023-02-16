<?php

require_once ("WebSitePadrao.php");
class Cadastrar extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "usuario";
    }
}

new Cadastrar();
