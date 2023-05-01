<?php
include_once('../../assets/conn.php');

$nome = $_POST['usuario'];
$senha = $_POST['senha'];

$db_user = $conn->query("SELECT * FROM user where user='{$nome}' and senha='{$senha}';");
if($db_user->num_rows)

?>