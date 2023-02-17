<?php

require_once ("conexao.php");
function listarRegistros(){
    $aDados = getDadosFromBancoDados();
    
    echo json_encode($aDados);
}

function loadAjaxUpdateRegistro(){
    
    $registro = json_decode($_POST["venda"], true);
    
    $acao = $_POST["acao"];
    
    if($acao == "ALTERACAO"){
        alterar($registro);
    } else if($acao == "INCLUSAO"){
        incluir($registro);
    } else if($acao == "EXCLUSAO"){
        excluir($registro);
    } else if($acao == "DETALHAR_VENDA"){
        $venda_id = $registro["venda_id"];
        detalharVenda($venda_id);
    }  else if($acao == "EXECUTA_EXCLUSAO_ITEM_VENDA"){
        $itemvenda_id = $registro["itemvenda_id"];
        excluirItemVenda($itemvenda_id, true);
    } else {
        echo json_encode("Ação invalida!");
    }
}

function detalharVenda($venda_id){
    
    $aDados = getDadosItemFromBancoDados($venda_id);
    
    echo json_encode($aDados);
}

function getPdoConnection(){
    $pdo = getConexao();
    
    return $pdo;
}

function excluir($registro){
    /** @var PDO $pdo */
    $pdo = getPdoConnection();
    
    $query = "DELETE FROM `venda` WHERE `venda_id` = :venda_id";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(':venda_id', $registro["venda_id"], PDO::PARAM_INT);
    
    $stmt->execute();
    
    // Exclui todos os item da venda tambem
    $aDadosItem = getDadosItemFromBancoDados($registro["venda_id"]);
    foreach ($aDadosItem as $Item){
        excluirItemVenda($Item->itemvenda_id, false, $Item->venda_id);
    }
}

function excluirItemVenda($itemvenda_id, $detalhaVenda = false, $venda_id = false){
    /** @var PDO $pdo */
    $pdo = getPdoConnection();
    
    $query = "DELETE FROM `itemvenda` WHERE `itemvenda_id` = :itemvenda_id";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->bindParam(':itemvenda_id', $itemvenda_id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    if($detalhaVenda){
        detalharVenda($venda_id);
    }
}

function incluir($registro){
    /** @var PDO $pdo */
    $pdo = getPdoConnection();
    
    $query = "INSERT INTO `venda` (cliente_id, formapagamento, total)
                  VALUES(:cliente_id, :formapagamento, :total)";
    
    $stmt = $pdo->prepare($query);
    
    $stmt = setParam($stmt, $registro);
    
    $stmt->execute();
}

function alterar($registro){
    /** @var PDO $pdo */
    $pdo = getPdoConnection();
    
    $query = " UPDATE `venda` SET
                      `cliente_id`     = :cliente_id,
                      `formapagamento` = :formapagamento,
                      `total`          = :total
                WHERE `venda_id`       = :venda_id";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':venda_id', $registro['id']);
    
    $stmt = setParam($stmt, $registro);
    
    $stmt->execute();
}

function setParam($stmt, $registro){
    $stmt->bindParam(':cliente_id', $registro['cliente']);
    $stmt->bindParam(':formapagamento', $registro['formapagamento']);
    $stmt->bindParam(':total', $registro['total']);
    return $stmt;
}

function getDadosFromBancoDados(){
    /** @var PDO $pdo */
    $pdo = getPdoConnection();
    
    $query = "SELECT venda_id,
                     cliente_id as cliente,
                     formapagamento,
                     total
                FROM `venda`";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute();
    $aDados = array();
    while($aDadosColuna = $stmt->fetchObject()){
        $aDados[] = $aDadosColuna;
    }
    
    return $aDados;
}

function getDadosItemFromBancoDados($venda_id){
    /** @var PDO $pdo */
    $pdo = getPdoConnection();
    
    $query = " SELECT itemvenda.itemvenda_id,
                      itemvenda.venda_id,
                      itemvenda.produto_id,
                      produto.descricao as produto,
                      itemvenda.quantidade,
                      itemvenda.preco_custo,
                      itemvenda.preco_venda
                FROM `itemvenda`
          INNER JOIN produto ON (produto.produto_id = itemvenda.produto_id)
               WHERE venda_id=$venda_id";
    
    $stmt = $pdo->prepare($query);
    
    $stmt->execute();
    $aDados = array();
    while($aDadosColuna = $stmt->fetchObject()){
        $aDados[] = $aDadosColuna;
    }
    
    return $aDados;
}

if(isset($_POST["funcao"])){
    $funcao = $_POST["funcao"];
    
    switch ($funcao){
        case "listarRegistros":
            listarRegistros();
            break;
        case "loadAjaxUpdateRegistro":
            loadAjaxUpdateRegistro();
            break;
    }
} else {
    echo json_encode(array("mensagem" => "Funcao invalida!"));
}

