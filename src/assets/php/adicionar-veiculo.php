<?php
// carregando dependencias
$raiz = $_SERVER['DOCUMENT_ROOT'];
include_once($raiz.'/SistemaDeCarro/src/assets/php/conn.php'); // puxando arquivo de conexao com o banco de dados
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
$sobre = $_POST['sobre'];
$portas = $_POST["portas"];
$hoje = date('Y,m,d');
$raiz = $_SERVER['DOCUMENT_ROOT'];
$pasta = $raiz . "/sistemadecarro/src/assets/img/imagens_veiculos/";
// query's no banco de dados


// codigo
try {
    //usamos o arroba para ocultar o possível erro retornado pelo PHP
    $teste = $conn->query("INSERT INTO `carro` (`id_carro`, `placa`, `valor`, `marca`, `modelo`, `versao`, `motor`, `ano`, `cor`, `combustivel`, `cambio`, `quilometragem`, `portas`, `carroceria`, `notificacao`, `dt_cadastro`,`sobre`, `status`)
     VALUES (NULL, '$placa', '$valor', '$marca', '$modelo', 
     '$versao', '$motor', '$ano', '$cor', '$combustivel',
      '$cambio', '$quilometragem', '$portas', '$carroceria',
       NULL, '$hoje','$sobre', '$status');");
       $idCarro = $conn->insert_id; 
  
    if (!$teste) { //se conexão falhar
       throw new Exception("Erro ao realizar a conexão com o banco de dados");
    }
 }
 catch (Exception $e) {
   $_SESSION['msgError'] = "Erro ao adicionar veiculo";
    header('location: http://localhost/sistemadecarro/admin/pages/adicionar-novo-veiculo/'); 
    exit;
 }
    
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
    $_SESSION['msgSucess'] = "Veículo adicionado";
    header('location: http://localhost/sistemadecarro/src/dashborad/pages/estoque/');

?>