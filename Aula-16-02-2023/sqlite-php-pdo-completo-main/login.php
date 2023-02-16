<?php

function getDadosFromBancoDados($email){
    require_once ("conexao.php");
    /** @var PDO $pdo */
    $pdo = getConexao();

    $query = "select * from `usuario` WHERE email like '%" . $email . "%'";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    return $stmt->fetchObject();
}

$logado = isset($_GET["login"]) ? $_GET["login"] : 999;
if($logado == "USUARIO_LOGADO"){
    // redirecionar para pagina de login
    header("Location: Home.php?login=USUARIO_LOGADO");
} else if ($logado == "LOGAR_SISTEMA"){

    require_once ("Bcrypt.php");
    $senha_informada_usuario = $_POST["senha"];
    $email_informado_usuario = $_POST["email"];

    $aDadosLogin = getDadosFromBancoDados($email_informado_usuario);

    $retorno = array("login" => false, "mensagem" => "Usuario/Senha não confere");
    if($aDadosLogin){
        $senha_banco_dados_com_hash = $aDadosLogin->senha;

        if (Bcrypt::check($senha_informada_usuario, $senha_banco_dados_com_hash)) {
            $email_informado_usuario = Bcrypt::hash($email_informado_usuario);

            $token_logado = $email_informado_usuario . $senha_banco_dados_com_hash;

            $retorno = array("login" => true, "mensagem" => "Usuario logado com sucesso!", "token_logado" => $senha_banco_dados_com_hash);
        }
    }

    echo json_encode($retorno);
} else {
    require_once ("login_sistema.html");
}