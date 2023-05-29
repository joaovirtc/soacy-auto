<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados

// definindo variaveis
$user = $_POST['user'];
$senha = md5($_POST['senha']);

// query's no banco de dados
try {
    //usamos o arroba para ocultar o possível erro retornado pelo PHP
    
    $sql = $conn->query("INSERT INTO `user` (`id_user`, `user`, `senha`) VALUES (NULL, '{$user}', '{$senha}');");
  
    if (!$sql) { //se conexão falhar
       throw new Exception("Erro ao realizar a conexão com o banco de dados");
    }
 }
 catch (Exception $e) {
   echo($e);
    exit;
 }
header('Location: http://localhost/sistemadecarro/src/dashboard/auth/singin/'); // mandando o usuario para o login


?>