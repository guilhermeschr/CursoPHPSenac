<?php

// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

echo '

<script src="js/jquery.min.js" defer></script>

<script defer>
    function testeAjax(){
        var oDados = {"funcao":"loadAjaxUpdateRegistro", 
            "contato": 1, "acao" : "TESTAR_AJAX"};

        $.ajax({
            url:"testeAjax.php",
            type:"POST",
            async:true,
            data: oDados,
            success:function(response){
                console.log("dados enviados:" + response);  
                
                //debugger;
                
                var oContato = JSON.parse(response);
                
                var codigo_contato = parseInt(oContato.contato);
                
                console.log("Codigo contato:" + codigo_contato);                
            }
        })
    }
    
</script>';

echo '<button type="button" class="button red" onclick="testeAjax(1)">Testar Ajax</button>';
