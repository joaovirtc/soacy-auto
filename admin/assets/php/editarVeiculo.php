<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$id = $_GET["id"];
$placa = $_POST["placa"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$versao = $_POST["versao"];
$ano = $_POST["ano"];
$valor = $_POST["valor"];
$valor = str_replace('R$ ', '', $valor);
$valor = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor);
$status = $_POST["status"];
$motor = $_POST["motor"];
$carroceria = $_POST["carroceria"];
$quilometragem = $_POST["quilometragem"];
$combustivel = $_POST["combustivel"];
$cambio = $_POST["cambio"];
$cor = $_POST["cor"];
$portas = $_POST["portas"];
$sobre = $_POST["sobre"];
$hoje = date('Y,m,d');
$raiz = $_SERVER['DOCUMENT_ROOT'];
$pasta = $raiz . "/sistemadecarro/imagens/";
// query's no banco de dados


// codigo
    $conn->query("UPDATE `carro` SET `placa`='$placa',`valor`='$valor',`marca`='$marca',`modelo`='$modelo',`versao`='$versao',
    `motor`='$motor',`ano`='$ano',`cor`='$ano',`combustivel`='$combustivel',`cambio`='$cambio',`quilometragem`='$quilometragem',
    `portas`='$portas',`carroceria`='$carroceria',`status`='$status', `sobre`='$sobre' WHERE `carro`.`id_carro` = $id;");


    header('location: http://localhost/sistemadecarro/admin/pages/estoque/')

?>