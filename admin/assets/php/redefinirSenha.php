<?php
// carregando dependencias
include_once('../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis

$senha = $_POST['senha'];
$confirmarSenha = $_POST['ConfirmarSenha'];

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
 header('Location: http://localhost/sistemadecarro/admin/pages/singin/');


?>