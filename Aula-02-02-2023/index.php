<?php

require_once('class/classCarro.php');

$oCarro = new Carro('1500,00');
$oCarro->modelo = 'Fusca';
$oCarro->cor = 'Branco';
$oCarro->quantidadePortas = 2;


echo $oCarro ->mostraModelo(). $oCarro->ligar();

echo $oCarro->mostraPreco();

echo $oCarro->abrirPorta('esquerda');

echo '<br><br>###################################<br>';

$oCarro2 = new Carro();
$oCarro2->modelo = 'Civic';
$oCarro2->cor = 'Prata';
$oCarro2->quantidadePortas = 4;

echo $oCarro2->mostraModelo(). $oCarro2->ligar();

echo $oCarro2->mostraPreco();


echo $oCarro->abrirPorta('direita');
