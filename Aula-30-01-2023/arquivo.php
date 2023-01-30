<?php


// echo 'Inicio do arquivo.php <br>';

// echo 'Pegando dados dos parametros da url';

$nomeParametro = 'NOME EM BRANCO';
$idadeParametro = 'IDADE EM BRANCO';
$validaDados = true;

if(isset($_GET["nome"])){
    $nomeParametro = $_GET["nome"];
}else{
    $validaDados = false;
}

if(isset($_GET["idade"])){
    $idadeParametro = $_GET["idade"];
}else{
    $validaDados = false;
}

if($validaDados){
    $frase = "Meu nome é " . $nomeParametro . " e tenho " . $idadeParametro ." anos de idade.";
    echo '<br><br>' . $frase;
}else{
    echo 'Parâmetros invalidos!!';
}



