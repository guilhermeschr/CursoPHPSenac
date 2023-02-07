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
    private $dataCriacao;
    private $saldoInicial;
    private $saldoAtual;
    private $operacoes = [];

    public function __construct($oCliente){
        $this->Cliente = $oCliente;
    }

    public function getCliente(){
        return $this->Cliente;
    }

    public function getDataCriacao(){
        return $this->dataCriacao;
    }

    public function getSaldoInicial(){
        return $this->saldoInicial;
    }

    public function getSaldoAtual(){
        return $this->saldoAtual;
    }

    public function getOperacoes(){
        return $this->operacoes;
    }

    public function setDataCriacao($data){
        $this->dataCriacao = $data;
    }

    public function setSaldoInicial($saldo){
        $this->saldoInicial = $saldo;

        $this->saldoAtual = $this->saldoInicial;
    }

    public function Sacar($saque){
        $this->saldoAtual -= $saque;

        $this->operacoes[] = ['Saque',$saque];

        echo 'Realizado saque do cliente '.$this->Cliente.' no valor de R$'.$saque.'. Saldo atual: R$'. $this->saldoAtual;
    }

    public function Depositar($deposito){
        $this->saldoAtual += $deposito;

        $this->operacoes[] = ['Deposito',$deposito];

        echo 'Realizado depósito do cliente '.$this->Cliente.' no valor de R$'.$deposito.'. Saldo atual: R$'. $this->saldoAtual;
    }

    public function exibeSaldo(){
        echo ('Saldo atual do cliente '. $this->Cliente . ' R$'. $this->saldoAtual);
    }

    public function exibeExtrato(){
        echo'<table border="2px">
        <tr>
            <th colspan="2">Extrato: '. $this->Cliente .'</th>
        <tr>
        <tr>
            <th>OPERAÇÃO</th>
            <th>VALOR</th>
        </tr>
        <tr>
            <th>Saldo Inicial</th>
            <th>'.$this->saldoInicial.'</th>
        </tr>';

        for($i = 0; $i < count($this->operacoes); $i++){
            echo "<tr>";
            for($j = 0; $j < count($this->operacoes[$i]); $j++){
                echo "<th>".$this->operacoes[$i][$j]."</th>";
            }
            echo "</tr>";
        }

        echo '<tr>
                    <th>Saldo Atual</th>
                    <th>'.$this->saldoAtual.'</th>
             </tr>
             
        </table>';
        

    }
}
?>

