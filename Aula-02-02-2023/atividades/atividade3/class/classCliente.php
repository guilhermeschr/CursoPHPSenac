<?php

class Cliente{
    
    private $nome;
    private $email;
    private $telefone;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefone()
    {
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