<?php

echo '<h1>Aula-09/02/2023</h1>';
require_once('conexao.php');

function getDados(){
    $pdo = getConexao();

    $query = "SELECT * FROM `contato`";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        return $result;
    }
    return array();
}

function getColunasTabela(){
    $htmlColunasTabela = '';

    $aDados = getDados();

    if(count($aDados)){

    }else{

    }
    $htmlColunasTabela .= '<tr>';

    $htmlColunasTabela .= '<td></td>';
    
    
   

    

    $htmlColunasTabela .= '</tr>';
}


// require_once('select.php');


//Lista de Contados em HTML com os daods do banco de dados(tabela HTML) 

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

?>