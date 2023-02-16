<?php

require_once ("WebSitePadrao.php");
class Servicos extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "servico";
    }
}

new Servicos();
