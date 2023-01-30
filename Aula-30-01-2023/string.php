<?php

echo 'arquivo string...';

if(isset($_GET["palavra"])){
    $palavra = $_GET["palavra"];

    echo 'Palavra '. $palavra;
    echo '<br>';

    $tamanho = atrlen($palavra);

    echo 'Tamanho' . $tamanho;

    echo '<br>Percorrendo as letras da palavra';
    for($i = 0;$i < $tamanho;$i++){
        $letra = $palavra[$i];
        echo '<br>Letra: '. $letra .' - posição: ' . $i;

        $aNovaPalavra[] = $letra;
    }

    echo '<br>Nova Palavra:<br>';
    //pega o tamanho do arrray
    $tamanho = cout($aNovaPalavra);
    for($i = 0;$i < $tamanho ;$i++){
        $letra = $aNovaPalavra[$i];
        echo '<br>Letra Nova: ' . $letra . ' - posição: ' . $i;
    }

    function mostraPalavra($palavra){
        if(is_array($palavra)){
            $tamanho = count($palavra);
        }else if(is_string($palavra)){
            $tamanho = strlen($palavra)
        }else{
            throw new Exception("Palavra invalida!");
        }
        for ($i = 0;$i < $tamanho; $i++){
            $letra = $palavra[$i];
            echo '<br>Letra: ' . $letra . ' - posição: ' . $i;
        }
    }

    function isPalindromo($palavra){
        $palidromo = false;

        //codigo verificando se é parindromo..

        if($palidromo){
            echo 'Palindromo!';
        }else{
            echo 'Palavra não é palindroma!';
        }
    }

}else{
    echo 'ERRO!!<br>PARÂMETROS INVALIDOS!!';
}