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

if(isset($_FILES['arquivo'])){
    $nomeArquivo = $_FILES['arquivo']['name'];
        $nvNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        $path = $nvNomeArquivo . "." . $extensao;
        $deuCerto = move_uploaded_file($_FILES["arquivo"]["tmp_name"], $pasta . $path);
        if($deuCerto) {
            $conn->query("INSERT INTO `foto`(`id_foto`, `path`, `id_carro`) VALUES (id_foto,'$path','$id')");
        }
}
    


// codigo
    $conn->query("UPDATE `carro` SET `placa`='$placa',`valor`='$valor',`marca`='$marca',`modelo`='$modelo',`versao`='$versao',
    `motor`='$motor',`ano`='$ano',`cor`='$ano',`combustivel`='$combustivel',`cambio`='$cambio',`quilometragem`='$quilometragem',
    `portas`='$portas',`carroceria`='$carroceria',`status`='$status', `sobre`='$sobre' WHERE `carro`.`id_carro` = $id;");

$_SESSION['msgSucess'] = "Dados editados com sucesso";
    header("location: http://localhost/sistemadecarro/admin/pages/visualizar-veiculo/?id={$id}")

?>