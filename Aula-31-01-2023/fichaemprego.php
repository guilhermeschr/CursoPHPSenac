<?php


// Ficha de emprego, que sera enviada para a empresa
// Ao final sera salvo no sistema da empresa
// Usando arquivo de textos
echo '################Ficha de Emprego############';
echo '<br>';
$arquivo_css = '<link rel="stylesheet" href="style.css">';

$formulario_html = '
    <form action="cadastrarfichaemprego.php" method="get">
        <label>CPF:</label>
        <input type="text" name="cpf" value="968.419.260-64">
        <br>
        <label>Nome:</label>
        <input type="text" name="nome" value="Gelvazio Camargo">
        <br>
        <label>Formação:</label>
        <select name="opcaoformacao">
            <option value="1">Ensino Fundamental Incompleto</option>
            <option value="2">Ensino Fundamental Completo</option>
            <option value="3">Ensino Medio Incompleto</option>
            <option value="4">Ensino Medio Completo</option>
            <option value="5">Ensino Superior Incompleto</option>
            <option value="6" selected>Ensino Superior Completo</option>
        </select>
        <br>
        <label>Vaga Emprego:</label>
        <select name="opcaovagaemprego">
            <option value="1">Desenvolvedor Frontend Junior Java</option>
            <option value="2">Desenvolvedor Frontend Junior PHP</option>            
            <option value="3">Desenvolvedor Backend Junior Java</option>            
            <option value="4" selected>Desenvolvedor Backend Junior PHP</option>            
        </select>
        <br>
        <br>
        <input type="submit" value="Confirmar">
    </form>    
';

echo $arquivo_css . $formulario_html;
