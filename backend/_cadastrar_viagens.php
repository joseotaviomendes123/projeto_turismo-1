<?php


// Include da conexão com o banco de dados
include 'conexao.php';

try{
    // exibir as váriaveis globais recebidas via POST
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";
    // exit;

    // variaveis que recebem os dados enviados via POST
    $titulo = $_POST['título'];
    $local = $_POST['local'];
    $Valor = $_POST['Valor'];
    $desc = $_POST['desc'];
 // ======================================================================
// upload da imagem
// caminho onde a imagem será armazenada
    $pasta = '../img/upload/';

// define o novo nome para upload 
    $imagem = 'imagem.jpg';

// funçaõ php que faz o upload da imagem 
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$imagem);

    exit;






// =======================================================================
    // variaveis que recebe a query SQL que será executada no BD
    $sql = "INSERT INTO
                tb_viagens
            (
                `titulo`,
                `local`,
                `valor`,
                `desc`
            )
            VALUES
            (
                '$titulo',
                '$local',
                '$Valor',
                '$desc'
            )    
            ";

    // prepara a execucão da query SQL acima
    $comando = $con->prepare($sql);

    // executa o comando com a query do banco de dados
    $comando -> execute();
    
    // exibe msg de sucesso ao inserir
    // echo "cadastro realizado com sucesso";
    header('Location: ../admin/gerenciar_viagens.php');

    // fechar a conexão
    $con = null;


}catch(PDOException $erro){
    echo $erro -> getMessage();
    die();

}

?>