<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET['id'];

// query's no banco de dados
$conn->query("UPDATE `leads` SET `visto` = 1 WHERE `leads`.`id` = $id;");
$_SESSION['msgSucess'] = "Marcado como visto";
header('Location: http://localhost/sistemadecarro/admin/pages/gerenciar-leads/'); // mandando o usuario para o painel de controle