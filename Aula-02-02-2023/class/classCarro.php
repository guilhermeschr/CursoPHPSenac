<?php

class Carro{

    public $modelo;
    public $cor;
    public $quantidadePortas;

    public function ligar(){
        echo 'Carro ligado';
    }

    public function desligar(){
        echo 'Carro desligado';
    }

    public function insereModelo($modelo){
        $this->modelo = $modelo;
    }

    public function mostraModelo(){
        return $this->modelo;
    }

}


?>