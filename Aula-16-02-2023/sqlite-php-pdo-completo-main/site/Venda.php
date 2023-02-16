<?php

require_once ("../conexao.php");
class Venda {

    public function processaDados(){
        return $this->insereNovaVenda();
    }
    
    protected function insereNovaVenda(){
        $cliente = isset($_POST["cliente"]) ? (int)$_POST["cliente"] : 0;
        
        if($cliente > 0){
            if($totalCalculado = $this->calculaTotalAtualVenda()){
                /** @var PDO $pdo */
                $pdo = getConexaoVenda();
            
                $query = "INSERT INTO `venda` (cliente_id, formapagamento, total)
                          VALUES(:cliente_id, :formapagamento, :total)";
            
            
                $registro = array();
                $registro['cliente'] = $cliente;
                $registro['formapagamento'] = "DINHEIRO";
                $registro['total'] = $totalCalculado;
                
                $stmt = $pdo->prepare($query);
                //
                $stmt = $this->setParam($stmt, $registro);
    
                $status = $stmt->execute();
                
                $stmt = null;
                $pdo = null;
                
                return $status;
            }
        }
        
        return false;
    }
    
    protected function setParam($stmt, $registro){
        $stmt->bindParam(':cliente_id', $registro['cliente']);
        $stmt->bindParam(':formapagamento', $registro['formapagamento']);
        $stmt->bindParam(':total', $registro['total']);
        
        return $stmt;
    }
    
    protected function calculaTotalAtualVenda(){
        $produto_id = isset($_POST["produto"]) ? (int)$_POST["produto"] : 0;
        $produto_quantidade = isset($_POST["quantidade"]) ? (int)$_POST["quantidade"] : 0;
        $total = false;
        if($produto_id > 0 && $produto_quantidade > 0){
             // Busca os dados do produto no banco de dados
            if($oProduto = $this->getDadosProduto($produto_id)){
                $total = $oProduto->precovenda * $produto_quantidade;
            }
        }
        
        return $total;
    }
    
    protected function getDadosProduto($produto_id){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();
        
        $query = "select * from `produto` WHERE produto_id = $produto_id";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        $oDados = $stmt->fetchObject();
    
        $stmt = null;
        $pdo = null;
        
        return $oDados;
    }
}
