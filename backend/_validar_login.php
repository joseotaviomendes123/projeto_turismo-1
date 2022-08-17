<?php

include "conexao.php";

try{
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE email='$usuario' AND senha='$senha'";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

// var_dump($dados);


// verifica se existem registros dentro da variavel dados 
    if($dados != null ){
        // se o usuario e senha sao validos irá entrar nessse trecho de código
        header('Location: ../admin/gerenciar_viagens.php');
    }else{
//se o usuario ou senha sao invalidos irá entrar nesse bloco de código
        echo "Usuário ou senha inválidos";
// header('ocation: ../adimin/index.html');
    }


}catch(PDOException $erro){
    echo $erro->getMessage();

}


?>