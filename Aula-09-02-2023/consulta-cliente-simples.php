<?php

$enunciado = 'Criar uma consulta de clientes igual a que acabamos de fazer.
<br>
    Para isso, no arquivo "conexao.php", adicione antes do "return $pdo", o trecho de codigo abaixo:<br>
<code>
    <i>
        $query = "CREATE TABLE IF NOT EXISTS cliente (cliente_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, telefone TEXT, email TEXT, cidade TEXT)";
        <br>
        $this->pdoConection->exec($query);
    </i>
</code>
<br><br>
';

echo $enunciado;

require_once('conexao.php');

function getDados(){
    $pdo = getConexao();

    $query = "SELECT * FROM `cliente`";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $aDados = [];
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
            
            $cliente_id = $aContatos["cliente_id"];
            $nome       = $aContatos["nome"];
            $telefone   = $aContatos["telefone"];
            $email      = $aContatos["email"];
            $cidade      = $aContatos["cidade"];

            $htmlColunasTabela .= '<tr>';

            $htmlColunasTabela .= "<td>$cliente_id</td>";
            $htmlColunasTabela .= "<td>$nome</td>";
            $htmlColunasTabela .= "<td>$telefone</td>";
            $htmlColunasTabela .= "<td>$email</td>";
            $htmlColunasTabela .= "<td>$cidade</td>";

            $htmlColunasTabela .= '</tr>';

        }

        
    }else{
        $htmlColunasTabela .= '<tr><td conspan="5"></td></tr>';
    }
    

    return $htmlColunasTabela;
}

function carregaContatos(){

    $htmlTabela = '<table border = "2px">';


    $htmlTabela .= '<thead>';

    $htmlTabela .= '<tr>';

    $htmlTabela .= '<th>Id</th>';
    $htmlTabela .= '<th>Nome</th>';
    $htmlTabela .= '<th>Telefone</th>';
    $htmlTabela .= '<th>E-mail</th>';
    $htmlTabela .= '<th>Cidade</th>';


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

carregaContatos();