<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET['id'];
$hoje = date('Y,m,d');
$raiz = $_SERVER['DOCUMENT_ROOT'];
$pasta = $raiz . "/sistemadecarro/imagens/";
// query's no banco de dados
$foto = mysqli_fetch_array($conn->query("SELECT * FROM `foto` WHERE `foto`.`id_foto` = $id"));


unlink($pasta.$foto["path"]);

$conn->query("DELETE FROM `foto` WHERE `foto`.`id_foto` = $id");


header("Location: http://localhost/sistemadecarro/admin/pages/editar-veiculo/?id={$foto['id_carro']}"); // mandando o usuario para pagina de ediçao do veiculo

