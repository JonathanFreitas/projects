<!DOCTYPE html>
    <?php
    require_once 'db_connect.php';
    session_start();
    
    //verificação IMPORTANTE
        if(!isset($_SESSION['logado'])){
        header('Location: index.php');
        
    }
    //DADOS DO USUARIO
    $id = $_SESSION['id_usuario'];
    $sql = "select * from usuarios where id= '$id'";
    $res = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($res);
    //fechar banco
    mysqli_close($connect);
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina Inicial</title>
    </head>
    <body>
        <h2>Pagina Restrita</h2>
        <h3>Olá, seja bem vindo <?php echo $dados['nome']; ?></h3>
        
        <a href="logout.php">SAIR</a>
    </body>
</html>
