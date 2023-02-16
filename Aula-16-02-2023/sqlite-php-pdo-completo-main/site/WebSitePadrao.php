<?php

require_once '../conexao.php';
class WebSitePadrao {
    
    public function __construct(){
        if($this->executaControleAjax()){
            // Se for uma chamada ajax, nao monta pagina,
            // apenas faz a ação do ajax e retorna
            return true;
        }
        
        $this->montaPaginaPrincipal();
    }
    
    protected function executaControleAjax(){
        // ADICIONA_ITEM_CARRINHO
        
        if(isset($_POST["acao"])){
            if($_POST["acao"] == "ADICIONA_ITEM_CARRINHO"){
                require_once ("Venda.php");
                
                /** @var Venda $oVenda*/
                $oVenda = new Venda();
                
                // Processa a venda
                if($oVenda->processaDados()){
                    echo json_encode(array("status" => true, "mensagem" => "Venda realizada com sucesso!"));
                } else {
                    echo json_encode(array("status" => false, "mensagem" => "Erro ao realizar venda!Contate o suporte!"));
                }
                
                return true;
            }
        }
        
        return false;
    }
    
    protected function getNomePagina(){
        return "produto";
    }
    
    protected function getDados(){
        /** @var PDO $pdo */
        $pdo = getConexao();
        
        $query = "SELECT * FROM `" . $this->getNomePagina() . "`";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        // percorrer os dados e colocar num array
        $aDados = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $aDados[] = $result;
        }
        
        return $aDados;
    }
    
    protected function carregaCabecalho(){
        $html = '<!DOCTYPE html>
            <html lang="pt-BR">
            
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
                      rel="stylesheet">
            
                <link rel="stylesheet" href="../css/main.css">
                <link rel="stylesheet" href="../css/button.css">
                <link rel="stylesheet" href="../css/records.css">
                <link rel="stylesheet" href="../css/modal.css">
                <link rel="stylesheet" href="../css/header.css">
                
                <script src="../js/jquery.min.js" defer></script>
                
                <title>Ecommerce - Compras Online</title>
            </head>
            <body>';
        
        $html .= $this->getHeaders();
        
        return $html;
    }
    
    protected function getStyleHeader(){
        return 'style="position: fixed;top:0;"';
    }
    
    protected function getHeaders(){
        return "<header class=\"header\" " . $this->getStyleHeader() . ">
                    <style>
                        .usuario-login {
                            height: 100%;
                            width: 200px;
                            background-color: #1FB6FF;
                            padding: 13px;
                            border-radius: 3px;
                        }
                    </style>
                    <ul class=\"menu\">
                        <li><a href='../index.php'>Sistema</a></li>
                        <li><a href='Produtos.php'>Produtos</a></li>
                        <li><a href='Servicos.php'>Serviços</a></li>
                        <li><a href='Categorias.php'>Categorias</a></li>
                        <li><a href='EntrarWebSite.php'>Entrar</a></li>
                        <li><a href='Cadastrar.php'>Cadastrar</a></li>
                        <div class=\"dados-usuario\">
                            <span class=\"usuario-login\"
                            id=\"usuario-nome\">Usuario:1 - Gelvazio Camargo</span>
                            <span class=\"usuario-login\" id=\"usuario_id\" style=\"display: none;\">1</span>
                        </div>
                    </ul>
                </header>";
    }
    
    protected function montaPaginaPrincipal(){
        $html_tabela = $this->carregaCabecalho();
        
        $html_tabela .= $this->getConteudoSite();
        
        $html_tabela .= $this->getFooter();
        
        echo $html_tabela;
    }
    
    protected function getConteudoSite(){
        $html = "<main>";
    
        $html .= $this->getDadosPaginaAtual();
        
        $html .= "</main>";
        
        return $html;
    }
    
    protected function getDadosPaginaAtual(){
        return "<h1>Pagina Atual</h1>";
    }
    
    protected function getFooter(){
        return '<footer class="footer">
                    Copyright &copy; Prof. Gelvazio Camargo
                </footer>
            </body>
            ' . $this->getScriptFooter() . '
            </html>';
    }
    
    protected function getScriptFooter(){
        // return '<script src="../js/main.js" defer></script>';
        return '';
    }

    protected function formataNumero($numero){
        $numero = str_replace(".",",",$numero);
        return $numero;
    }
}
