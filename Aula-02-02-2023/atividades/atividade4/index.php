<?php


require_once('class/classContaBancaria.php');
require_once('Exercicio04.php');

$oClaudio = new ContaBancaria('Claudio');

$oClaudio->setDataCriacao('01/02/2023');
$oClaudio->setSaldoInicial(500);

$oClaudio->Depositar(800);

echo'<br>';
echo'<br>';
$oClaudio->exibeSaldo();

echo'<br>';
echo'<br>';
$oClaudio->Sacar(300);

echo'<br>';
echo'<br>';
$oClaudio->exibeSaldo();

echo'<br>';
echo'<br>';
$oClaudio->exibeExtrato();


echo'<br>';
echo'<br>';
$oLuiz = new ContaBancaria('Luiz');

$oLuiz->setDataCriacao('24/01/2020');
$oLuiz->setSaldoInicial(5000);

$oLuiz->Depositar(840);

echo'<br>';
echo'<br>';
$oLuiz->exibeSaldo();

echo'<br>';
echo'<br>';
$oLuiz->Sacar(320);

echo'<br>';
echo'<br>';
$oLuiz->exibeSaldo();

echo'<br>';
echo'<br>';
$oLuiz->exibeExtrato();


echo'<br>';
echo'<br>';
$oJosue = new ContaBancaria('Josué');

$oJosue->setDataCriacao('01/01/2000');
$oJosue->setSaldoInicial(50);

$oJosue->Depositar(400);

echo'<br>';
echo'<br>';
$oJosue->exibeSaldo();

echo'<br>';
echo'<br>';
$oJosue->Sacar(10);

echo'<br>';
echo'<br>';
$oJosue->Sacar(15);

echo'<br>';
echo'<br>';
$oJosue->Sacar(25);

echo'<br>';
echo'<br>';
$oJosue->Depositar(231);

echo'<br>';
echo'<br>';
$oJosue->exibeSaldo();

echo'<br>';
echo'<br>';
$oJosue->exibeExtrato();
?>