<?php

class PessoaFisica extends Cliente{

    private $cpf;

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getPessoa(){
        return $this->cpf;
    }
}