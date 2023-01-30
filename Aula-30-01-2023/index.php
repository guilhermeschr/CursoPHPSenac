<?php

//CHAMDO ARQUIVOS PHP

$html = '<a href="http://localhost/CursoPHPSenac/Aula-30-01-2023/arquivo.php">Abre arquivo.php</a>';


//PASSOANDO PARAMETROS PARA A URL
$nome = "Guilherme";
$idade = 17;
$parametros = "?nome=" . $nome . "&idade=" . $idade;

$urlBase = 'http://localhost/CursoPHPSenac/Aula-30-01-2023/arquivo.php';
//junta os parametros mo url base
$urlBase = $urlBase . $parametros;

echo ('<a href="'.$urlBase.'">Chamando arquivo.php</a><br>');

//######################################################################
$urlBase = 'http://localhost/CursoPHPSenac/Aula-30-01-2023/string.php';

$palavra = "arara";
$parametros = "?palavra=" . $palavra;
//junta os parametros mo url base
$urlBase = $urlBase . $parametros;
echo ('<a href="'.$urlBase.'">Chamando arquivo string</a>');





?>