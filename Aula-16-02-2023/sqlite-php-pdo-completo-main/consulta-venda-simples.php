<?php

$html = '<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="js/jquery.min.js" defer></script>
    <script src="js/itemvenda.js" defer></script>

    <title>VENDA</title>
</head>
<body>
    <header class="header">
        <ul class="menu">
            <li><a href=\'Home.php\'>Home</a></li>
            <li><a href=\'ConsultaCliente.php\'>Clientes</a></li>
            <li><a href=\'ConsultaContato.php\'>Contatos</a></li>
            <li><a href=\'consulta-produto-simples.php\'>Produtos</a></li>
            <li><a href=\'consulta-venda-simples.php\'>Vendas</a></li>
            <!--<li>Config
                <ul>
                    <li>Admin</li>
                    <li>Usuarios</li>
                    <li>Relatorios</li>
                </ul>
            </li> -->
        </ul>
    </header>
    <header>
        <h1 class="header-title">Cadastro de Vendas</h1>
    </header>
    <main>
        <section class="acoes">
            <button type="button" class="button green" id="consultarDados">Consultar</button>
            <button type="button" class="button blue mobile" id="cadastrarVenda">Incluir</button>
            <button type="button" class="button red" id="limparDados">Limpar Dados</button>
        </section>
        <table id="tableVenda" class="records">
            <caption><h1>Vendas</h1></caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Forma Pagamento</th>
                    <th>Total</th>
                    <th>A????o</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="modal" id="modal">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Nova Venda</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form id="form" class="modal-form">
                    <input type="hidden" id="venda_id" data-index="new" class="modal-field" placeholder="Id">
                    <input type="text" id="cliente" class="modal-field" placeholder="C??digo do Cliente" required value="1">
                    <input type="text" id="formapagamento" class="modal-field" placeholder="Estoque" required value="DINHEIRO">
                    <input type="text" id="total" class="modal-field" placeholder="Total da Venda" required value="10,00">
                </form>
                <footer class="modal-footer">
                    <button id="salvar" class="button green">Salvar</button>
                    <button id="cancelar" class="button blue">Cancelar</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modal-produtos-venda">
            <div class="modal-content">
                <header class="modal-header">
                    <h1>Produtos da Venda</h1>
                    <span class="modal-close" id="modalCloseVenda">&#10006;</span>
                </header>
                <table id="tableDadosItemVenda" class="records">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Pre??o Custo</th>
                            <th>Pre??o Venda</th>
                            <th>Lucro Liquido</th>
                            <th>Total</th>
                            <th>A????o</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <footer class="modal-footer" id="modal-footer">
                    <button id="cancelarItemVenda" class="button blue">Fechar</button>
                </footer>
            </div>
        </div>
        <!--MENSAGEM DE CONFIRMACAO - MODAL-->
        <style>
            #conteudo-mensagem {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
        </style>
        <div class="modal" id="modal-confirmacao">
            <div class="modal-content">
                <header class="modal-header">
                    <h1>Produtos da Venda</h1>
                    <span class="modal-close" id="modalCloseConfirmacao">&#10006;</span>
                </header>
                <div id="conteudo-mensagem">
                    <span id="mensagem">MODAL DE CONFIRMACAO!</span>
                </div>
                <footer class="modal-footer" id="modal-footer">
                    <button id="confirmaModalConfirmacao" class="button blue">Confirmar</button>
                    <button id="fecharModalConfirmacao" class="button red">Cancelar</button>
                </footer>
            </div>
        </div>
    </main>
    <footer>
        Copyright &copy; Prof. Gelvazio Camargo
    </footer>
</body>

<script src="js/venda.js" defer></script>

</html>
';

echo $html;
