<?php

class Cliente{
    
    private $nome;
    private $email;
    private $telefone;
    private $cpf;

    public function __construct($nome,$email,$telefone,$cpf){
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function exibir()
    {
        echo '<br>Nome: '. $this->nome ;
        echo '<br>Email: '. $this->email ;
        echo '<br>Telefone: '. $this->telefone ;
    }

}

?>