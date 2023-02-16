<?php

require_once ("WebSitePadrao.php");
class Produtos extends WebSitePadrao {

    protected function getNomePagina(){
        return "produto";
    }
    
    protected function getDadosPaginaAtual() {
        return $this->getListaProduto();
    }

    protected function getStyleHeader(){
        return "style=\"position: absolute;top:0; width:95%;\"";
    }
    
    protected function getListaProduto() {
        $html = '<div class="lista_produto">';
        $html .= ' <div class="produto-teste">
                        <link rel="stylesheet" href="css/produto.css">
                        <!-- Boxicons CDN Link -->
                        <link href=\'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css\' rel=\'stylesheet\'>
                        
                        <div class="body-produto">';
    
        $html .= '<style>
                        main {
                            width: 100%;
                        }
                        
                        #adicionarCarrinho:hover{
                            cursor: pointer;
                        }
                    </style>';

        // usar caroussel para mudar lista de produto por linha em bootstrapp
        // https://getbootstrap.com.br/docs/4.1/components/carousel/
        
        // $aListaProduto = array(1,2,3,4);
        
        $aListaProduto = $this->getDadosFromBancoDados();
        // pegar do banco de dados


        foreach ($aListaProduto as $oProduto) {

            $precoFormatado = $this->formataNumero($oProduto->preco);
            $oProduto->preco = $precoFormatado;

            $html .= $this->getProduto($oProduto->codigo, $oProduto->descricao, $oProduto->preco, $imagem = false);
        }

        $html .= '        </div>';
        $html .= '    </div>';
        $html .= '</div>';
        
        $html .= $this->getScriptProdutos();
        
        return $html;
    }

    function getDadosFromBancoDados(){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();
        
        $query = "SELECT produto_id as codigo,
                         descricao,
                         estoque,
                         precocusto,
                         printf(\"%.2f\",precovenda) as preco
                    FROM `produto`";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        $aDados = array();
        while($aDadosColuna = $stmt->fetchObject()){
            $aDados[] = $aDadosColuna;
        }
        
        return $aDados;
    }
    
    protected function getDadosProdutoBancoDados($codigoProduto) {
        $oProdutoBancoDados = $this->getDadosProduto($codigoProduto);
        
        $oProduto = new stdClass();
        $oProduto->codigo = $codigoProduto;
        $oProduto->descricao = $oProdutoBancoDados->descricao;

        $precoFormatado = $this->formataNumero($oProdutoBancoDados->precovenda);

        $oProduto->preco = $precoFormatado;
        
        return $oProduto;
    }

    

    protected function getDadosProduto($produto_id){
        /** @var PDO $pdo */
        $pdo = getConexaoVenda();
        
        $query = "select 
                    printf(\"%.2f\", precovenda) as precovenda, 
                    descricao from `produto` WHERE produto_id = $produto_id";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        $oDados = $stmt->fetchObject();
        
        $stmt = null;
        $pdo = null;
        
        return $oDados;
    }
    
    private function getProduto($idproduto, $descricao, $preco, $imagem = false) {
        
        $functionAlteraImagem = ' onclick="alteraImagemProduto(' . $idproduto . ')"';
        $functionAdicionaEvento = ' onmouseover="adicionaEvento(' . $idproduto . ')"';
        
        return '<div class="product-card">
                    <div class="logo-cart">
                        <img src="images/logo.jpg" alt="logo">
                        <i class=\'bx bx-shopping-bag\'></i>
                    </div>
                    <div class="main-images main-images_' . $idproduto . '" id="imagem_' . $idproduto . '">
                        <img id="blue" class="blue active" src="images/blue.png" alt="blue">
                        <img id="pink" class="pink" src="images/pink.png" alt="blue">
                        <img id="yellow" class="yellow" src="images/yellow.png" alt="blue">
                    </div>
                    <div class="shoe-details">
                        <span class="shoe_name">' . $descricao . '</span>
                        <p>Lorem ipsum dolor sit lorenm i amet, consectetur adipisicing elit. Eum, ea, ducimus!</p>
                        <div class="stars">
                            <i class=\'bx bxs-star\' ></i>
                            <i class=\'bx bxs-star\' ></i>
                            <i class=\'bx bxs-star\' ></i>
                            <i class=\'bx bxs-star\' ></i>
                            <i class=\'bx bx-star\' ></i>
                        </div>
                    </div>
                    <div class="color-price">
                        <div class="color-option" id="color-option_' . $idproduto . '" ' . $functionAlteraImagem . $functionAdicionaEvento . '>
                            <span class="color">Cores:</span>
                            <div class="circles">
                                <span class="circle blue active" id="blue"></span>
                                <span class="circle pink " id="pink"></span>
                                <span class="circle yellow " id="yellow"></span>
                            </div>
                        </div>
                        <div class="price">
                            <span class="price_num">R$ ' . $preco . '</span>
                            <span class="price_letter">Nine dollar only</span>
                        </div>
                    </div>
                    <div class="button">
                        <div class="button-layer"></div>
                        <button id="adicionarCarrinho" onclick="adicionaCarrinhoCompra(' . $idproduto . ')">Adicionar ao Carrinho</button>
                    </div>
                </div>';
    }

    protected function getScriptProdutos() {
        return '<script>
                var aListaProdutoAdicionado = [];
                
                function adicionaEvento(produto){
                    if(!aListaProdutoAdicionado.includes(produto)){
                        aListaProdutoAdicionado.push(produto);
                        alteraImagemProduto(produto)
                    }
                }
                
                function alteraImagemProduto(produto){
                    console.log("produto:" + produto);
                    
                    let mudouImagem = document.querySelector(`#color-option_${produto}`);
                    
                    let circle = document.querySelector(`#color-option_${produto}`);
                    circle.addEventListener("click", (e)=>{
                        alteraImagem(e.target, produto, circle);
                    });
                }
                
                function alteraImagem(target, produto, circle){
                    if(target.classList.contains("circle")){
                        circle.querySelector(".active").classList.remove("active");
                        
                        target.classList.add("active");
                        
                        document.querySelector(".main-images_" + produto + " .active").classList.remove("active");
                        document.querySelector(`.main-images_${produto} .${target.id}`).classList.add("active");
                    }
                }
                
                function adicionaCarrinhoCompra(produto){
                    console.log("adicionando item ao carrinho de compras:" + produto);
                    
                    let usuario = document.querySelector("#usuario_id").textContent;
                    usuario = parseInt(usuario);
                    if(usuario > 0){
                        adicionaCarrinhoCompraAjax(produto, usuario);
                    } else {
                        alert("Usuario nao esta logado!");
                    }
                }
                
                function adicionaCarrinhoCompraAjax(produto, usuario){
                    var oDados = {
                        "cliente": usuario,
                        "produto": produto,
                        "quantidade": 3,
                        "acao"   : "ADICIONA_ITEM_CARRINHO"
                    };
                    
                    $.ajax({
                        url:"Produtos.php",
                        type:"POST",
                        async:true,
                        data: oDados,
                        success:function(response){
                            console.log("dados retornados:" + JSON.stringify(response));
                            
                            var oDados = JSON.parse(response);
                            
                            alert(oDados.mensagem);
                        }
                    })
                }
                
            </script>';
    }

}

new Produtos();