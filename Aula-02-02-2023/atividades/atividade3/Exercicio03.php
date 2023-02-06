<?php

$enunciado = '
Criar uma classe chamada Clientes, 
<br> esta classe deve conter os seguintes atributos e métodos: 
<br> Atributos: nome, email e telefone 
<br> Métodos: exibir(); O método exibir deve exibir na tela todos os dados do cliente.

<br> a) Crie uma classe chamada ClienteFisica que estenda a classe Clientes. Adicione nesta classe o atributo $cpf;
<br> b) Crie uma classe chamada ClienteJuridica que estenda a classe Clientes. Adicione nesta classe o atributo $cnpj;
<br> c) Crie nas duas classes o seguinte método: getPessoa(). 
      Este método deve retornar o CPF no caso de pessoa física ou CNPJ no caso de pessoa jurídica;
<br> d) Crie pelo menos 3 objetos e chame o metodo getPessoa();

<br><br>
Ao final entregar no github de cada um.
';

echo $enunciado;