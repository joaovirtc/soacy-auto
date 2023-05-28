<?php 
$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
header("location: https://api.whatsapp.com/send?phone={$telefone}&text=Olá {$nome}")

?>