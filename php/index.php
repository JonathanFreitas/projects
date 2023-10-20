<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //conexao
        require_once 'db_connect.php';
        //sessao
        session_start();
           if(isset($_POST['btn-entrar'])){
               $erros = array();
               $login = mysqli_escape_string($connect, $_POST['login']);
               $senha = mysqli_escape_string($connect, $_POST['senha']);
               
               if(empty($login) or empty($senha)){
                   $erros[] = "<li> O campo Login e Senha precisa ser preenchido </li>";
               }else{
                   $sql = "select login from usuarios where login = '$login' ";
                   $res = mysqli_query($connect, $sql);
                   
                   if(mysqli_num_rows($res) > 0){
                       // criptografar senha
                       $senha = md5($senha);
                       $sql = "select * from usuarios where login = '$login' and senha = '$senha'";
                       $res = mysqli_query($connect, $sql);
                            if(mysqli_num_rows($res) ==1){
                                $dados = mysqli_fetch_array($res);
                                
                                mysqli_close($connect);
                                
                                $_SESSION['logado'] = true;
                                $_SESSION['id_usuario'] = $dados['id'];
                                header('Location: home.php');
                                echo "LOGIN OK!";
                            }else{
                                $erros[] = "<li> Usuario ou senha estao erradas! </li>";
                            }
                   } else {
                       $erros[] = "<li> Usuario nao existe! </li>";
                   }
                   
               }
           
           
           }
           if(!empty($erros)){
               foreach ($erros as $erro){
                   echo $erro;
                }
            }
        ?>
        <h1>Login</h1>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          Nome:  <input type="text" name="login"><br>
          Senha:  <input type="password" name="senha"><br>
          <input type="submit" value="Entrar" name="btn-entrar"/>
        </form>
    </body>
</html>
