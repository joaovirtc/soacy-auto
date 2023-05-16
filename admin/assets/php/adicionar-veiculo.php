<?php
// carregando dependencias
include_once('../../assets/conn.php'); // puxando arquivo de conexao com o banco de dados
session_start(); // carregando sessoes

// definindo variaveis

$placa = $_POST["placa"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$versao = $_POST["versao"];
$ano = $_POST["ano"];
$valor = $_POST["valor"];
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
$hoje = date('Y,m,d');

$pasta = "../../../imagens/";
// query's no banco de dados


// codigo

    $conn->query("INSERT INTO `carro` (`id_carro`, `placa`, `valor`, `marca`, `modelo`, `versao`, `motor`, `ano`, `cor`, `combustivel`, `cambio`, `quilometragem`, `portas`, `carroceria`, `notificacao`, `dt_cadastro`, `status`)
     VALUES (NULL, '$placa', '$valor', '$marca', '$modelo', 
     '$versao', '$motor', '$ano', '$cor', '$combustivel',
      '$cambio', '$quilometragem', '$portas', '$carroceria',
       NULL, '$hoje', '$status');");
       $idCarro = $conn->insert_id;
    for($i=0; $i < count($_FILES['arquivo']["name"]); $i++){
        
        $nomeArquivo = $_FILES['arquivo']['name'][$i];
        $nvNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        $path = $nvNomeArquivo . "." . $extensao;
        $deuCerto = move_uploaded_file($_FILES["arquivo"]["tmp_name"][$i], $pasta . $path);
        if($deuCerto) {
            $conn->query("INSERT INTO `foto`(`id_foto`, `path`, `id_carro`) VALUES (id_foto,'$path','$idCarro')");
        }
    }

    header('location: http://localhost/sistemadecarro/admin/pages/estoque/')

?>