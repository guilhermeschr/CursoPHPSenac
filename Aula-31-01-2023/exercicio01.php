<?php



$enunciado = " Faça um algoritmo para verificar se uma palavra é
 palindroma.
 Palavra palindroma, da o mesmo nome de traz para
 frente.Exemplos: civic, ana, arara.";

echo $enunciado;

echo '<br><br>';

$palavra = "teclado";

$tamanho = strlen($palavra);

echo 'palavra:' . $palavra;
echo '<br>';
echo 'Tamanho:' . $tamanho;

echo '<br>Percorrendo as letras da palavra';

for($i = 0; $i < $tamanho; $i++) {
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
echo '<br>';
echo '<br>';
