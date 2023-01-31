<?php

echo 'Faça um alogitmo para verificar se uma palavra é palidroma.';

echo '<br><br>';

$palavra = 'civic';
$tamanho = strlen($palavra);

echo 'Palavra '.$palavra;
ECHO '<BR>';
echo 'Tamanho da palavra '.$tamanho;

for ($i=0; $i < $tamanho ; $i++) { 
    $letra = $palavra[$i];
    echo '<br>Letra: ' . $letra . ' - posição:' . $i;
}
echo '<br>';
echo 'Montando a nova palavra';
echo '<br>';
$posicao_inicial = $tamanho - 1;

$nova_palavra = "";
for($i = $posicao_inicial; $i >= 0; $i--) {
    $letra = $palavra[$i];

    echo '<br>Letra: ' . $letra . ' - posição:' . $i;

    $nova_palavra .= $letra;
}

echo '<br>';
echo '<br>';
echo '<br>';
echo 'Nova palavra formada:'. $nova_palavra;
echo '<br>';

if($nova_palavra == $palavra){
    echo 'Palavra palindroma!';
} else {
    echo 'Palavra não é palindroma!';
}
?>