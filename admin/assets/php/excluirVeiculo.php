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
$fotos = $conn->query("SELECT * FROM `foto` WHERE `foto`.`id_carro` = $id");
foreach($fotos as $foto){
    unlink($pasta.$foto["path"]);
}

$conn->query("DELETE FROM `carro` WHERE `carro`.`id_carro` = $id");

header('Location: http://localhost/sistemadecarro/admin/'); // mandando o usuario para o painel de controle

