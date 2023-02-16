<?php

require_once ("WebSitePadrao.php");
class Categorias extends WebSitePadrao {
    
    protected function getNomePagina(){
        return "servico";
    }

    protected function getDadosPaginaAtual(){
        return "<h1>Pagina Categorias</h1>";
    }
}

new Categorias();
