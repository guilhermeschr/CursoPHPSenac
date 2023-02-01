<?php

function grava_candidato($Email,$Nome,$cidade,$telefone,$cursoInteresse){
    
    

    $arquivo = "listaCandidatos.json";


    $lista_incritos = array();
    if(file_exists($arquivo)){
        // Se existe candidato, adiciona os candidatos na lista
        $lista_incritos = file_get_contents($arquivo);

        $lista_incritos = json_decode($lista_incritos, true);
    }

    // Adiciono o candidato atual no array de candidatos
    $lista_incritos[] = getDadosUsuarios();

    $lista_incritos_json = json_encode($lista_candidatos);

    file_put_contents("listacandidatos.json", $lista_incritos_json);

    // echo 'Candidato sendo gravado no sistema:<br>';

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

function getDadosUsuarios(){

    $Email = $_GET['sEmailCantidato'];
    $Nome = $_GET['sNomeCantidato'];
    $cidade = $_GET['sCidadeCandidato'];
    $telefone = $_GET['sTelefoneCandidato'];
    // $cursoInteresse = $_GET['sCursoInterrese'];

    $candidatoAtual = array[];
    $candidatoAtual['email'] =  $Email;
    $candidatoAtual['nome'] =  $Nome;
    $candidatoAtual['cidade'] =  $cidade;
    $candidatoAtual['telefone'] =  $telefone;
    $candidatoAtual['curso'] =  $cursoInteresse;

    
    $opcao_curso1 = isset($_GET["1"]) ? $_GET["1"] : 0;
    $opcao_curso2 = isset($_GET["2"]) ? $_GET["2"] : 0;
    $opcao_curso3 = isset($_GET["3"]) ? $_GET["3"] : 0;
    $opcao_curso4 = isset($_GET["4"]) ? $_GET["4"] : 0;
    $opcao_curso5 = isset($_GET["5"]) ? $_GET["5"] : 0;

    $opcao_curso_outros = isset($_GET["outros"]) ? $_GET["outros"] : 0;

    $candidatoAtual['$opcao_curso1'] =  $cursoInteresse;
    $candidatoAtual['$opcao_curso2'] =  $cursoInteresse;
    $candidatoAtual['$opcao_curso3'] =  $cursoInteresse;
    $candidatoAtual['$opcao_curso4'] =  $cursoInteresse;
    $candidatoAtual['$opcao_curso5'] =  $cursoInteresse;

    $candidatoAtual['$opcao_curso_outros'] =  $cursoInteresse;

    return $candidatoAtual;
}



function inicia_pagina_candidato() {
    echo '<link rel="stylesheet" href="style.css">';
    echo '################Ficha de Incrição: ################';
    echo '<br>';
}



inicia_pagina_candidato();
mostra_mensagem_candidato();

grava_candidato();