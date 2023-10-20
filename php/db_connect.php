<?php

$servername = "localhost";
$username = "root";
$senha = "";

$db_namer = "sistema-login";

$connect = mysqli_connect($servername, $username, $senha, $db_namer);

if(mysqli_connect_error()){
    echo "Falha na conexao: ". mysqli_connect_error();
}else{
    
}