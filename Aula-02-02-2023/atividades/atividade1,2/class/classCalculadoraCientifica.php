<?php

require_once('class/classCalculadora.php');

class CalculadoraCientifica extends Calculadora{

    public function Fatorial(){
        $n = $this->valor1;

        $resultado = 1;
        $contador = $n;
        while( $contador > 0 ){
            
            echo '<br>Contador'.$contador;

            $resultado *= $contador; 

            $contador--;
        }

        echo '<br>Fatorial do valor1 = ' . $resultado;
    }
}