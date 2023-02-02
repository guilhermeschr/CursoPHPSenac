<?php

require_once('class/classCalculadora.php');
require_once('class/classCalculadoraCientifica.php');

$oConta1 = new Calculadora(50,25);

$oConta1->Somar();

$oConta1->Subtrair();

$oConta1->Multiplicar();

$oConta1->Dividir();

echo '<br><hr>';

$oConta3 = new CalculadoraCientifica(5,2);

echo '<br>';

$oConta3->Fatorial();

