<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$fotos = $_FILES["arquivo"];
$marca = $_POST["marca"];
$valor = $_POST["valor"];
$valor = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor);
// query's no banco de dados


// codigo
echo("<pre>");
var_dump($_FILES, $marca, $valor);

?>