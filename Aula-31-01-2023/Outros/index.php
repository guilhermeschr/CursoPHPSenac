<?php

//ficha de emprego, que sera enviado para a empresa
//ao final sera salvo no sistema de empresa
//usando arquivo texto

$formulario_html = '
    <form action="fichaemprego.php" method="get">
        <label for="">Nome:</label><br>
        <input type="text" name="nome">
        <label for="">Formação:</label>
        <select name="opcaoformacao" id="">
            <option value="">Ensino Fundamental Incompleto</option>
            <option value="">Ensino Fundamental Completo</option>
            <option value="">Ensino Medio Incompleto</option>
            <option value="">Ensino Medio Completo</option>
            <option value="">Ensino Superior Incompleto</option>
            <option value="">Ensino Superior Completo</option>
        </select>
        <label for="">Vaga de emprego::</label>
        <select name="opcaoemprego" id="">
            <option value="">Desenvolvedor Junior</option>
            <option value="">Desenvolvedor Pleno</option>
            <option value="">Desenvolvedor Senior</option>
            
        </select>
        <input type="submit">
    </form>
';

echo $formulario_html;
?>
