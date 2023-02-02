<?php

function grava_ficha_inscricao() {
    $arquivo = "listainscritos.json";

    // Inicia a lista de candidatos vazia
    $lista_inscritos = array();
    if(file_exists($arquivo)){
        // Se existe candidato, adiciona os candidatos na lista
        $lista_inscritos = file_get_contents($arquivo);

        // decodifica o arquivo json
        $lista_inscritos = json_decode($lista_inscritos, true);
    }

    if(validaCandidatoJaInscrito($lista_inscritos)){
        // Adiciona o candidato atual no array
        $lista_inscritos[] = getDadosCandidato();

        // Coloca no formato json
        $lista_inscritos_json = json_encode($lista_inscritos);

        // Grava o arquivo de dados
        file_put_contents($arquivo, $lista_inscritos_json);


        mostra_mensagem_candidato();

    } else {
        echo 'Já existe um candidato inscrito com este e-mail!';
    }
}

function validaCandidatoJaInscrito($lista_inscritos){
    $email = $_GET["email"];

    $valida = true;
    foreach($lista_inscritos as $oDados){
        $email_inscrito = $oDados["email"];

        if($email_inscrito == $email){
            $valida = false;

            break;
        }
       //  echo '<br><br>Email ja cadastrado:' . $email_inscrito;
    }

    return $valida;
}

function getDadosCandidato(){
    // echo "<pre>" . print_r($_GET, true) . "</pre>";

    $email    = $_GET["email"];
    $nome     = $_GET["nome"];
    $cidade   = $_GET["cidade"];
    $telefone = $_GET["telefone"];

    $candidato_atual = array();
    $candidato_atual["email"]    = $email;
    $candidato_atual["nome"]     = $nome;
    $candidato_atual["cidade"]   = $cidade;
    $candidato_atual["telefone"] = $telefone;

    $opcao_curso_1  = isset($_GET["1"]) ? 1 : 0;
    $opcao_curso_2  = isset($_GET["2"]) ? 1 : 0;
    $opcao_curso_3  = isset($_GET["3"]) ? 1 : 0;
    $opcao_curso_4  = isset($_GET["4"]) ? 1 : 0;
    $opcao_curso_5  = isset($_GET["5"]) ? 1 : 0;
    $opcao_curso_6  = isset($_GET["6"]) ? 1 : 0;
    // $opcao_curso_7  = isset($_GET["7"]) ? 1 : 0;
    // $opcao_curso_8  = isset($_GET["8"]) ? 1 : 0;
    // $opcao_curso_9  = isset($_GET["9"]) ? 1 : 0;
    // $opcao_curso_10 = isset($_GET["10"]) ? 1 : 0;
    // $opcao_curso_11 = isset($_GET["11"]) ? 1 : 0;
    // $opcao_curso_12 = isset($_GET["12"]) ? 1 : 0;

    $opcao_curso_outros = isset($_GET["outros"]) ? $_GET["outros"] : "";

    $candidato_atual["opcao_curso_1"] = $opcao_curso_1;
    $candidato_atual["opcao_curso_2"] = $opcao_curso_2;
    $candidato_atual["opcao_curso_3"] = $opcao_curso_3;
    $candidato_atual["opcao_curso_4"] = $opcao_curso_4;
    $candidato_atual["opcao_curso_5"] = $opcao_curso_5;
    $candidato_atual["opcao_curso_6"] = $opcao_curso_6;
    // $candidato_atual["opcao_curso_7"] = $opcao_curso_7;
    // $candidato_atual["opcao_curso_8"] = $opcao_curso_8;
    // $candidato_atual["opcao_curso_9"] = $opcao_curso_9;
    // $candidato_atual["opcao_curso_10"] = $opcao_curso_10;
    // $candidato_atual["opcao_curso_11"] = $opcao_curso_11;
    // $candidato_atual["opcao_curso_12"] = $opcao_curso_12;

    $candidato_atual["opcao_curso_outros"] = $opcao_curso_outros;

    return $candidato_atual;
}

function mostra_mensagem_candidato() {
    echo "Inscrição efetuada com sucesso!";
}

function inicia_pagina_candidato() {
    echo '################Ficha de Inscrição############';
    echo '<br>';
}

inicia_pagina_candidato();

grava_ficha_inscricao();










