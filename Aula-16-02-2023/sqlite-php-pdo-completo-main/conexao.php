<?php

function getConexao(){

    try {
        $pdo = new PDO('sqlite:db/database.sqlite3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    $query = "CREATE TABLE IF NOT EXISTS contato (contato_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, sobrenome TEXT, endereco TEXT, telefone TEXT, email TEXT, nascimento TEXT)";
    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS cliente (cliente_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, telefone TEXT, email TEXT, cidade TEXT)";
    $pdo->exec($query);
    
    $query = "CREATE TABLE IF NOT EXISTS produto (produto_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descricao TEXT,estoque INTEGER, precocusto REAL, precovenda REAL)";
    $pdo->exec($query);
    
    $query = "CREATE TABLE IF NOT EXISTS venda (venda_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER, formapagamento TEXT, total REAL)";
    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS usuario (usuario_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                email TEXT, senha TEXT )";
    $pdo->exec($query);

    return $pdo;
}

function getConexaoVenda(){

    try {
        $pdo = new PDO('sqlite:../db/database.sqlite3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    $query = "CREATE TABLE IF NOT EXISTS contato (contato_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, sobrenome TEXT, endereco TEXT, telefone TEXT, email TEXT, nascimento TEXT)";
    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS cliente (cliente_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, telefone TEXT, email TEXT, cidade TEXT)";
    $pdo->exec($query);
    
    $query = "CREATE TABLE IF NOT EXISTS produto (produto_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descricao TEXT,estoque INTEGER, precocusto REAL, precovenda REAL)";
    $pdo->exec($query);
    
    $query = "CREATE TABLE IF NOT EXISTS venda (venda_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cliente_id INTEGER, formapagamento TEXT, total REAL)";
    $pdo->exec($query);

    $query = "CREATE TABLE IF NOT EXISTS usuario (usuario_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                email TEXT, senha TEXT )";
    $pdo->exec($query);

    // Tabelas do e-commerce
    $query = "CREATE TABLE IF NOT EXISTS itemvenda (
                  itemvenda_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                  venda_id INTEGER,
                  produto_id INTEGER,
                  quantidade INTEGER,
                  preco_custo REAL,
                  preco_venda REAL)";
    $pdo->exec($query);
    
    $query = "CREATE TABLE IF NOT EXISTS statuspedidovenda (
                  status_venda_id INTEGER PRIMARY KEY NOT NULL,
                  status TEXT)"; // STATUS_VENDA_FINALIZADA  ou STATUS_VENDA_INICIADA
    $pdo->exec($query);
    
    return $pdo;
}
