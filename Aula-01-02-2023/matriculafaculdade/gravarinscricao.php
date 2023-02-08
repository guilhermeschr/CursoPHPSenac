<?php

function grava_ficha_inscricao() {
    $arquivo = "listainscritos.json";

    $lista_inscritos = array();
    if(file_exists($arquivo)){

        $lista_inscritos = file_get_contents($arquivo);


        $lista_inscritos = json_decode($lista_inscritos, true);
    }

    if(validaCandidatoJaInscrito($lista_inscritos)){
       
        $lista_inscritos[] = getDadosCandidato();

        $lista_inscritos_json = json_encode($lista_inscritos);

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
    }

    return $valida;
}

function getDadosCandidato(){

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

    $opcao_curso_outros = isset($_GET["outros"]) ? $_GET["outros"] : "";

    $candidato_atual["opcao_curso_1"] = $opcao_curso_1;
    $candidato_atual["opcao_curso_2"] = $opcao_curso_2;
    $candidato_atual["opcao_curso_3"] = $opcao_curso_3;
    $candidato_atual["opcao_curso_4"] = $opcao_curso_4;
    $candidato_atual["opcao_curso_5"] = $opcao_curso_5;
    $candidato_atual["opcao_curso_6"] = $opcao_curso_6;

    $candidato_atual["opcao_curso_outros"] = $opcao_curso_outros;

    return $candidato_atual;
}

function mostra_mensagem_candidato() {
    echo "Inscrição efetuada com sucesso!";
}

grava_ficha_inscricao();










