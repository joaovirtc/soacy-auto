
<?php 

// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes
$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
$id = $_GET['id'];

// query's no banco de dados
$conn->query("UPDATE `leads` SET `visto` = 1 WHERE `leads`.`id` = $id;");


header("location: https://api.whatsapp.com/send?phone={$telefone}&text=Olá {$nome}")

?>

