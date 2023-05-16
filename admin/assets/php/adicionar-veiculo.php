<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis

$marca = $_POST["marca"];
$valor = $_POST["valor"];
$valor = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor);
// query's no banco de dados


// codigo



if(isset($_FILES['arquivo'])){

    for($i=0; $i < count($_FILES['arquivo']["name"]); $i++){
        echo($_FILES['arquivo']['name'][$i] . "<br>");  
    }
}



?>