<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis

$senha = md5($_POST['senha']);

// query's no banco de dados
try {
    //usamos o arroba para ocultar o possível erro retornado pelo PHP
    
    $redefinirSenha = $conn->query("UPDATE `user` SET `senha` = '{$senha}';");
  
    if (!$redefinirSenha) { //se conexão falhar
       throw new Exception("Erro ao realizar a conexão com o banco de dados");
    }
 }
 catch (Exception $e) {
   echo($e);
    
    exit;
 }
 session_destroy();
header('Location: http://localhost/sistemadecarro/src/dashboard/pages/singin/'); // mandando o usuario para o login


?>