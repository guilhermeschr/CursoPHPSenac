<?php

//require_once ("ConsultaCliente.php");return;

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
    
    //$query = "delete  FROM `venda`";
    //$query = "delete  FROM `statuspedidovenda`";

    $query = "select *  FROM `venda`";

    $query = "select *  FROM `itemvenda`";
//    $query = "select *  FROM `statuspedidovenda`";

    // $query = "drop table IF EXISTS `statuspedidovenda`";
    
    //$query = "delete FROM `itemvenda`";
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
