<?php
require_once('classVeiculo.php');
class Moto extends Veiculo{

    private $cilindradas;

    public function empinar(){
        echo 'Moto empinando';
    }

    public function set(Type $var = null){
        
    }
}