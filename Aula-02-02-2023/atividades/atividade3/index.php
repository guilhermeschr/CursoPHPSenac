<?php

    require_once('class/classCliente.php');
    require_once('class/classPessoaJuridica.php');
    require_once('class/classPessoaFisica.php');

    require_once('Exercicio03.php');
    
    echo '<br>';
    $oPedro = new Cliente();

    $oPedro->setNome('Pedro');
    $oPedro->setEmail('pedro@gmail.com');
    $oPedro->setTelefone('(47)99573-3162');

    echo $oPedro->exibir();
    echo '<br>';
   
    
    $oSenac = new PessoaJuridica();
    
    $oSenac->setNome('Senac');
    $oSenac->setEmail('senac@gmail.com');
    $oSenac->setTelefone('(47)99472-8662');
    $oSenac->setCnpj('21.428.415/0001-30');
    
    echo $oSenac->exibir();
    echo '<br>';
    echo $oSenac->getPessoa();
    

    echo '<br>';
    $oJoao = new PessoaFisica();
    
    $oJoao->setNome('João');
    $oJoao->setEmail('joaonhizo@gmail.com');
    $oJoao->setTelefone('(47)99271-6462');
    $oJoao->setCpf('210.428.415-45');
    
    echo $oJoao->exibir();
    echo '<br>';
    echo $oJoao->getPessoa();
    
    
    echo '<br>';
    $oLuiz = new PessoaFisica();
    
    $oLuiz->setNome('Luiz');
    $oLuiz->setEmail('luiz@outlook.com');
    $oLuiz->setTelefone('(48)99564-2564');
    $oLuiz->setCpf('145.248.525-43');
    
    echo $oLuiz->exibir();
    echo '<br>';
    echo $oLuiz->getPessoa();
    
    
    ?>