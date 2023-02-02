<?php

class Veiculo{

    public $modelo;
    public $cor;
    public $preco;

    public function __construct($preco = false){
        if($preco){
            $this->preco = $preco;
        }
    }

    public function mostraPreco(){

        $this->preco = isset($this->preco) ? $this->preco : "0,00";

        echo '<br>Preço do Veiculo: ' . $this->preco;
    }

    public function ligar(){
        echo 'Veiculo ligado ';
    }

    public function desligar(){
        echo 'Veiculo desligado ';
    }

    public function insereModelo($modelo){
        $this->modelo = $modelo;
    }

    public function mostraModelo(){
        return $this->modelo;
    }

}


?>