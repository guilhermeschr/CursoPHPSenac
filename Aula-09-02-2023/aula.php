<?php

echo '<h1>Aula-09/02/2023</h1>';
require_once('conexao.php');

function getDados(){
    $pdo = getConexao();

    $query = "SELECT * FROM `contato`";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $aDados[]= $result;
    }
    
    
    return $aDados;
}

function getColunasTabela(){
    $htmlColunasTabela = '';

    $aDados = getDados();

    if(count($aDados)){

        foreach($aDados as $aContatos){

            $contato_id = $aContatos["contato_id"];
            $nome       = $aContatos["nome"];
            $sobrenome  = $aContatos["sobrenome"];
            $endereco   = $aContatos["endereco"];
            $telefone   = $aContatos["telefone"];
            $email      = $aContatos["email"];
            $nascimento = $aContatos["nascimento"];

            $htmlColunasTabela .= '<tr>';

            $htmlColunasTabela .= "<td>$contato_id</td>";
            $htmlColunasTabela .= "<td>$nome</td>";
            $htmlColunasTabela .= "<td>$sobrenome</td>";
            $htmlColunasTabela .= "<td>$endereco</td>";
            $htmlColunasTabela .= "<td>$telefone</td>";
            $htmlColunasTabela .= "<td>$email</td>";
            $htmlColunasTabela .= "<td>$nascimento</td>";

            $htmlColunasTabela .= '</tr>';

        }

        
    }else{
        $htmlColunasTabela .= '<tr><td conspan="7"></td></tr>';
    }
    

    return $htmlColunasTabela;
}

function carregaContatos(){

    $htmlTabela = '<table border = "2px">';


    $htmlTabela .= '<thead>';

    $htmlTabela .= '<tr>';

    $htmlTabela .= '<th>Id</th>';
    $htmlTabela .= '<th>Nome</th>';
    $htmlTabela .= '<th>Sobrenome</th>';
    $htmlTabela .= '<th>Endereço</th>';
    $htmlTabela .= '<th>Telefone</th>';
    $htmlTabela .= '<th>E-mail</th>';
    $htmlTabela .= '<th>Nascimento</th>';


    $htmlTabela .= '</tr>';

    $htmlTabela .= '</thead>';

    $htmlTabela .='<tbody>';
    $htmlTabela .= '<tr>';

    $htmlTabela .= getColunasTabela();

    $htmlTabela .= '</tr>';
    $htmlTabela .='</tbody>';

    $htmlTabela .= '</table>';

    echo $htmlTabela;
}
//Lista de Contados em HTML com os daods do banco de dados(tabela HTML) 
carregaContatos();
?>