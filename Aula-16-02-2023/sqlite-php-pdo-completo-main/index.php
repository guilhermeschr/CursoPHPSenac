<?php

// require_once ("ConsultaCliente.php");

require_once ("conexao.php");
function getDadosFromBancoDados(){
    /** @var PDO $pdo */
    $pdo = getConexao();

    $query = "SELECT produto_id,
                     descricao,
                     estoque,
                     precocusto,
                     precovenda
                FROM `produto`";

    $stmt = $pdo->prepare($query);

    $stmt->execute();
    $aDados = array();
    while($aDadosColuna = $stmt->fetchObject()){
        $aDados[] = $aDadosColuna;
    }

    return $aDados;
}

function getDadosItemVendaFromBancoDados(){
    /** @var PDO $pdo */
    $pdo = getConexao();

    $query = "SELECT *
                FROM `itemvenda` order by 1 desc";

    $stmt = $pdo->prepare($query);

    $stmt->execute();
    $aDados = array();
    while($aDadosColuna = $stmt->fetchObject()){
        $aDados[] = $aDadosColuna;
    }

    return $aDados;
}

$aDados = getDadosItemVendaFromBancoDados();

echo "<pre>" . print_r($aDados, true). "</pre>";
