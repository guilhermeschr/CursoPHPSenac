<?php

class PessoaJuridica extends Cliente{

    private $cnpj;

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getPessoa(){
        return 'CNPJ: '. $this->cnpj;
    }
}