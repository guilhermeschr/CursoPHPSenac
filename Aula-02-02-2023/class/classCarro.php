<?php
require_once('class/classVeiculo.php');

class Carro extends Veiculo{

    public $quantidadePortas;

    public function abrirPorta($porta){
        echo '<br>Porta ' . $porta . ' aberta';
    }

}


?>