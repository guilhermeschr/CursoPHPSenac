<?php

$enunciado = "Crie uma ficha de matricula universitaria para os alunos que querem ingressar na faculdade.<br>
Para isso, utilize no minimo os campos abaixo:<br>
Use como base o link de inscricao no IFC de Rio do Sul:<br>
https://docs.google.com/forms/d/e/1FAIpQLSfVJUw8CNf1qQTgeYZuubtABQr_orcFjFIYJLdlzFaKa2GgUw/viewform

<br>
Que contem os seguintes campos:
<ul></ul>

Ao finalizar a inscricao, cada aluno deve ser gravado num arquivo texto em formato json.
<br>
Caso ja tenha um aluno gravado, o novo aluno deve ser adicionado na lista de inscritos.
<br>
Para isso use como modelo o projeto atual de matricula, mas crie uma nova pasta para o projeto 
de matricula da faculdade de nome 'matriculafaculdade' e poste no seu github apos acabar.
";

echo $enunciado;


function grava_candidato($Email,$Nome,$cidade,$telefone,$cursoInteresse){
    $candidatoAtual = array[];
    $candidatoAtual['email'] =  $Email;
    $candidatoAtual['nome'] =  $Nome;
    $candidatoAtual['cidade'] =  $cidade;
    $candidatoAtual['telefone'] =  $telefone;
    $candidatoAtual['curso'] =  $cursoInteresse;

    $arquivo = "listaCandidatos.json";


    $lista_candidatos = array();
    if(file_exists($arquivo)){
        // Se existe candidato, adiciona os candidatos na lista
        $lista_candidatos = file_get_contents($arquivo);

        // Adicionar o novo candidato na lista de dados existente
        $lista_candidatos = json_decode($lista_candidatos, true);
    }

    // Adiciono o candidato atual no array de candidatos
    $lista_candidatos[] = $candidato_atual;

    $lista_candidatos_json = json_encode($lista_candidatos);

    file_put_contents("listacandidatos.json", $lista_candidatos_json);

    echo 'Candidato sendo gravado no sistema:<br>';

}

$opcao_curso = isset($_GET["1"]) ? $_GET["1"] : 0;
$opcao_curso = isset($_GET["2"]) ? $_GET["2"] : 0;
$opcao_curso = isset($_GET["3"]) ? $_GET["3"] : 0;
$opcao_curso = isset($_GET["4"]) ? $_GET["4"] : 0;
$opcao_curso = isset($_GET["5"]) ? $_GET["5"] : 0;
$opcao_curso = isset($_GET["6"]) ? $_GET["6"] : 0;


$Email = $_GET['sEmailCantidato'];
$Nome = $_GET['sNomeCantidato'];
$cidade = $_GET['sCidadeCandidato'];
$telefone = $_GET['sTelefoneCandidato'];
$cursoInteresse = $_GET['sCursoInterrese'];

grava_candidato($Email,$Nome,$cidade,$telefone,$cursoInteresse);