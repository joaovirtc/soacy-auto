<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET['id'];

// query's no banco de dados
$conn->query("UPDATE `leads` SET `visto` = 1 WHERE `leads`.`id` = $id;");
$_SESSION['msgSucess'] = "Marcado como visto";
header('Location: http://localhost/sistemadecarro/src/dashboard/pages/gerenciar-leads/'); // mandando o usuario para o painel de controle

?>