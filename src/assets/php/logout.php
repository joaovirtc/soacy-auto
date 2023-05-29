<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis


// query's no banco de dados


// codigo

// destruindo todas as sessoes

    session_destroy();
    header('Location: http://localhost/sistemadecarro/src/dashboard/pages/singin/');


?>