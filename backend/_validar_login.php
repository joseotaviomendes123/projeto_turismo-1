<?php

include "conexao.php";

try{
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE usuario='$usuario' AND senha='$senha'";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FLETCH_ASSOC);

    var_dump($dados);



}catch(PDOException $erro){
    echo $erro->getMessage();

}


?>