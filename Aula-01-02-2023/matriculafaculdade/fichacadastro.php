<?php

$html = '
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap:55px;
            margin-top: 15px;
        }
        
        form {
            border: 1px solid blueviolet;
            border-radius: 15px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap:15px;
        }
        
        .campo {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        
        li {
            list-style: none;
            display: flex;
            gap:10px;
        }
        
        input[type="submit"]{
            padding: 10px 15px;
            border-radius: 15px;
            border: 1px solid blueviolet;
            width: 200px;
            transition: all .4s ease-in-out;
        }
        
        input[type="submit"]:hover {
            cursor: pointer;
            background-color: blueviolet;
            color: aliceblue;
            border: 1px solid #4b0d83;
        }
        
        .botao {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .obrigatorio {
            color:red;
        }
    </style>
    
    <body>
        <h5>
            Preencha os campos abaixo para receber informações sobre as datas de
            inscrição para os cursos do IFC Rio do Sul.
        <br>Entraremos em contato por e-mail quando editais de ingresso forem
        publicados.
        </h5>
        <form action="gravarinscricao.php" method="get">        
            <div class="campo">
                <label>Endereço de e-mail:<span class="obrigatorio">*<span></label>
                <input type="text" name="email">
            </div>
            <div class="campo">
                <label>Seu nome:<span class="obrigatorio">*<span></label>
                <input type="text" name="nome">
            </div>
            <div class="campo">
                <label>Sua cidade:<span class="obrigatorio">*<span></label>
                <input type="text" name="cidade">
            </div>
            <div class="campo">
                <label>Seu telefone:<span class="obrigatorio">*<span></label>
                <input type="text" name="telefone">
            </div>
            
            <div class="campo">
                <label>Tenho interesse no(s) seguinte(s) curso(s):<span class="obrigatorio">*<span></label>
                <ul>
                    <li>
                        <input type="checkbox" name="1">
                        Técnico em Agropecuária Integrado ao Ensino Médio
                    </li>
                    <li><input type="checkbox" name="2">Técnico em Agroecologia Integrado ao Ensino Médio</li>
                    <li><input type="checkbox" name="3">Técnico em Informática Integrado ao Ensino Médio</li>
                    <li><input type="checkbox" name="4">Técnico em Agropecuária Subsequente ao Ensino Médio</li>
                    <li><input type="checkbox" name="5">Técnico em Agrimensura Subsequente ao Ensino Médio</li>
                    <li><input type="checkbox" name="6">Agronomia</li>
                    <li><input type="checkbox" name="7">Ciência da Computação</li>
                    
                    <li><input type="checkbox" name="8">Licenciatura em Pedagogia</li>
                    <li><input type="checkbox" name="9">Licenciatura em Matemática</li>
                    <li><input type="checkbox" name="10">Licenciatura em Física</li>
                    <li><input type="checkbox" name="11">Pós-Graduação em Agronomia: Sistemas Agrícolas Regionais</li>
                    <li><input type="checkbox" name="12">Outros:<input type="text" name="outros"></li>
                </ul>
             </div>    
            <div class="botao">    
                <input type="submit" value="Enviar">
            </div>
        </form>
    </body>
';

echo $html;
