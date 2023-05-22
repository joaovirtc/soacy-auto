<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET['id'];
$hoje = date('Y,m,d');

// query's no banco de dados
$conn->query("UPDATE `carro` SET `status` = 'vendido' WHERE `carro`.`id_carro` = $id;");
$conn->query("INSERT INTO `vendidos`(`id_venda`, `id_carro`, `dt_venda`) VALUES (id_venda,$id,'$hoje')");
$_SESSION['msgSucess'] = "Veículo vendido";
header('Location: http://localhost/sistemadecarro/admin/pages/financeiro/'); // mandando o usuario para o painel de controle

