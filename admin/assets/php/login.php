<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis
$nome = $_POST['usuario'];
$senha = $_POST['senha'];

// query's no banco de dados
$db_user = $conn->query("SELECT * FROM user where user='{$nome}' and senha='{$senha}';");
$db_user_arr = mysqli_fetch_array($db_user);

// codigo

// verificando se o banco de dados retornou que o user é valido
if($db_user->num_rows != 0 or $db_user->num_rows != null){
    $_SESSION["userID"] = $db_user_arr["id_user"]; // criando session com id de usuario
    header('Location: http://localhost/sistemadecarro/admin/'); // mandando o usuario para o painel de controle
}else{
    header('Location: http://localhost/sistemadecarro/admin/pages/singin/?err=Erro ao fazer login');
     // caso os dados estejam errados, volta para pagina de login com um erro
}

?>