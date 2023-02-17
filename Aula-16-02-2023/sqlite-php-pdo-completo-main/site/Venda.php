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
    
    protected function calculaTotalAtualVenda($produto_quantidade = 1){
        $produto_id = isset($_POST["produto"]) ? (int)$_POST["produto"] : 0;
        $total = false;
        if($produto_id > 0){
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

    public function adicionaItemCarrinho(){
        // Existe um carrinho de compras em aberto no dia para o cliente atual?Tabela de compras de item
        //
        //  * Sim => Adiciona o produto no carrinho de compras atual
        //    * Existe o produto atual no carrinho?
        //      * Sim -> Adiciona 1 na quantidade
        //      * Nao -> Criar um novo item no carrinho e adiciona 1 na quantidade.
        //  * Nao => Cria um novo carrinho de compras com status aberto para a data de hoje.

        $cliente = isset($_POST["cliente"]) ? (int)$_POST["cliente"] : 0;

        if($cliente > 0){

            // Pega o id da venda com status=STATUS_VENDA_INICIADA
            $oVenda = $this->getVendaIniciada($cliente, "STATUS_VENDA_INICIADA");

            $venda_id = 0;
            if(is_object($oVenda)){
                $venda_id = (int)$oVenda->venda_id;
            }

            // Se nao existir uma venda, cria uma venda com o produto ja adicionado

            if($venda_id == 0){
                $this->insereNovaVenda();

                $oVenda = $this->getVendaIniciada($cliente);

                $venda_id = (int)$oVenda->venda_id;

                $this->atualizaStatusVenda($venda_id);

                $oVenda = $this->getVendaIniciada($cliente, "STATUS_VENDA_INICIADA");

                $venda_id = (int)$oVenda->venda_id;
            }

            return $this->adicionaItemVendaAtual($venda_id);
        }

        return false;
    }

    protected function getVendaIniciada($cliente, $status = false){
        if($status){
            $query = "  SELECT venda.venda_id 
                          FROM venda 
                     LEFT JOIN statuspedidovenda ON (statuspedidovenda.status_venda_id = venda.venda_id)
                         WHERE cliente_id = $cliente
                           AND statuspedidovenda.status = '$status'";
        } else {
            $query = "  SELECT venda.venda_id 
                          FROM venda
                      ORDER BY venda_id DESC limit 1";
        }

        /** @var PDO $pdo */
        $pdo = getConexaoVenda();

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $oDados = $stmt->fetchObject();

        $stmt = null;
        $pdo = null;

        return $oDados;
    }

    protected function atualizaStatusVenda($venda_id, $status = "STATUS_VENDA_INICIADA"){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();

        $query = "INSERT INTO `statuspedidovenda` (status_venda_id, status)
                          VALUES(:status_venda_id, :status)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':status_venda_id', $venda_id);
        $stmt->bindParam(':status', $status);

        $status = $stmt->execute();

        $stmt = null;
        $pdo = null;

        return $status;
    }

    protected function adicionaItemVendaAtual($venda_id){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();

        $produto_id = isset($_POST["produto"]) ? (int)$_POST["produto"] : 0;

        $quantidade = 1;
        $query = "INSERT INTO itemvenda ( venda_id,
                                          produto_id,
                                          quantidade,
                                          preco_custo,
                                          preco_venda) 
                                          VALUES (
                                              :venda_id,
                                              :produto_id,
                                              :quantidade,
                                              :preco_custo,
                                              :preco_venda
                                          )";

        $existe = $this->existeProdutoNaVenda($venda_id, $produto_id);
        if($existe){
            $oItemAtual = $this->getQuantidadeProdutoAtualVenda($venda_id, $produto_id);

            $quantidadeAtual = $oItemAtual->quantidade;

            $quantidade = $quantidadeAtual + 1;

            $query = "UPDATE itemvenda SET quantidade = $quantidade WHERE venda_id=$venda_id and produto_id=$produto_id";

            $stmt = $pdo->prepare($query);
        } else {
            $stmt = $pdo->prepare($query);

            if($oProduto = $this->getDadosProduto($produto_id)){
                $stmt->bindParam(':venda_id', $venda_id);
                $stmt->bindParam(':produto_id', $produto_id);
                $stmt->bindParam(':quantidade', $quantidade);
                $stmt->bindParam(':preco_custo', $oProduto->precocusto);
                $stmt->bindParam(':preco_venda', $oProduto->precovenda);
            }
        }

        $status = $stmt->execute();

        $stmt = null;
        $pdo = null;

        return $status;
    }

    protected function getQuantidadeProdutoAtualVenda($venda_id, $produto_id){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();

        $query = "SELECT quantidade from itemvenda WHERE venda_id=$venda_id and produto_id=$produto_id";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $oDados = $stmt->fetchObject();

        $stmt = null;
        $pdo = null;

        return $oDados;
    }

    protected function existeProdutoNaVenda($venda_id, $produto_id){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();

        $query = "SELECT quantidade from itemvenda WHERE venda_id=$venda_id and produto_id=$produto_id";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $oDados = $stmt->fetchObject();

        $stmt = null;
        $pdo = null;

        if(is_object($oDados)){
            return true;
        }

        return false;
    }

}
