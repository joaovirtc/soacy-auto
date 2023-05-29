<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET['id'];
$hoje = date('Y,m,d');
$raiz = $_SERVER['DOCUMENT_ROOT'];
$pasta = $raiz . "/sistemadecarro/src/assets/img/imagens_veiculos/";
// query's no banco de dados
$fotos = $conn->query("SELECT * FROM `foto` WHERE `foto`.`id_carro` = $id");
foreach($fotos as $foto){
    unlink($pasta.$foto["path"]);
}

$conn->query("DELETE FROM `carro` WHERE `carro`.`id_carro` = $id");
$_SESSION['msgSucess'] = "Veiculo excluido";
header('Location: http://localhost/sistemadecarro/src/dashboard/pages/estoque/'); // mandando o usuario para o painel de controle

