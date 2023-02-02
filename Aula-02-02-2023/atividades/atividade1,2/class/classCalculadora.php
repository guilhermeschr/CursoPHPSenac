<?php

class Calculadora{

    public $valor1;
    public $valor2;

    public function __construct($valor1 = false,$valor2 = false){
        if($valor1){
            if($valor2){
                $this->valor1 = $valor1;
                $this->valor2 = $valor2;

                echo '<br>Valor 1 = '. $this->valor1;
                echo '<br>Valor 2 = '. $this->valor2;
            }
        }
    }

    public function Somar(){

        echo '<br><br>Soma: ' . $this->valor1 + $this->valor2;
    }
    public function Subtrair(){

        echo '<br>Subtrair: ' .$this->valor1 - $this->valor2;
    }
    public function Multiplicar(){

        echo '<br>Multiplicar: ' . $this->valor1 * $this->valor2;
    }
    public function Dividir(){
        
        echo '<br>Divisão: ' . $this->valor1 / $this->valor2;
    }
}