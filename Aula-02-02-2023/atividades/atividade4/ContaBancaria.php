<?php

class Cliente {

    public $nome;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
}

class ContaBancaria {

    public $Cliente;

    public function __construct($oCliente){
        $this->Cliente = $oCliente;
    }

    public function getCliente(){
        return $this->Cliente;
    }
}

$oCliente = new Cliente();
$oCliente->nome = 'Joao';

$oContaBancaria = new ContaBancaria($oCliente);

echo 'Nome cliente:' . $oContaBancaria->getCliente()->getNome();
