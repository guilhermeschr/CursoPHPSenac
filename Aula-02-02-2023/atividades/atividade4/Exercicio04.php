<?php

$enunciado = 'Criar uma classe chamada ContaBancaria, 
 <br>esta classe vai ter os seguintes atributos e métodos: 
 <br><b>Atributos:</b> 
 <ul>
    <li>Cliente (vai ser um objeto para a classe modelada no exercício 3);</li> 
    <li>Data de criação;</li>
    <li>SaldoInicial;</li>
    <li>SaldoAtual;</li>
    <li>Operacoes - será um array com as operações realizadas</li> 
 </ul>
<b>Métodos:</b> 
<ul>
    <li>Sacar() - recebe como parâmetro um valor e diminui do saldo do cliente, 
        <br>deve escrever na tela: <br>
        <b>Realizado saque do cliente João no valor de R$ 100,00.</b>
    </li>
    <li>
        Saldo atual: R$ 500,00”. 
        <br> Quando realizado um saque, deverá ser registrado no array de operacoes para conferência do extrato.
    </li>
    <li>
        Depositar() - recebe como parâmetro um valor e aumenta o saldo do cliente,
        <br> deve escrever na tela:
        <br><b>"Realizado depósito para o cliente João no valor de R$ 100,00. 
        <br> Saldo atual R$ 600,00".</b> 
        <br> Quando realizado um depósito, deverá ser registrado no array de operacoes para 
        <br> conferência do extrato 
    </li>
    <li>
        exibeSaldo() - Deve escrever na tela: "Saldo atual do cliente João R$ 600,00". 
    </li>

    <li>exibeExtrato() - Deve percorrer e mostrar na tela todas as operações
        <br>realizadas pelo cliente no seguinte formato:
        <br>
        <br>Cliente:<b>João</b>
        <br>E-mail:<b>joao@email.com</b>
        <br>Telefone:<b>(47)98845-4477</b>
        <br>CPF/CNPJ:<b>061.015.147-55</b>
        <br>
        
     </li> 
    </ul>

Deve conter os dados de pelo menos 3 clientes, assim como foi feito com as classes carro
        
<br><br>
Ao final entregar no github de cada um.
<br><br><br><br>
';

echo $enunciado;




