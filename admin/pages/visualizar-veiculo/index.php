<?php 

// carregando dependencias
include_once('../../assets/conn.php');
session_start();

// variaveis
$idCarro = $_GET["id"];


// query´s
$veiculo = $conn->query("SELECT * from carro where id_carro = $idCarro;");
$dt_car = mysqli_fetch_array($veiculo);
$fotos = $conn->query("SELECT * from foto where id_carro = $idCarro");

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo($dt_car['modelo'] . ' ' . $dt_car['versao']) ?></title>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <main class="layout" id="openFormActiveOpacity">
      <aside class="sidebar">
        <div class="content-sidebar">
          <div class="header-sidebar">
            <p>LOGO</p>
          </div>
          <div class="menu">
            <div class="menu-principal">
              <div>
                <p class="title-small-sidebar">Menu Principal</p>
              </div>
              <a href="../../index.php" class="nav-link">
                <i class="ri-function-line icon-nav-link"></i>
                <p class="title-nav-link">Dashboard</p>
              </a>
              <a href="../estoque/" class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a href="../financeiro/" class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </a>
              <a href="../gerenciar-leads/" class="nav-link">
                <i class="ri-team-line icon-nav-link"></i>
                <p class="title-nav-link">Gerenciamento de Leads</p>
              </a>
            </div>
            <a href="../../assets/php/logout.php" class="nav-link"
              ><!-- esse link leva ao processo de logout com php -->

              <i class="ri-logout-circle-line icon-nav-link"></i>

              <p class="title-nav-link">Sair</p>
            </a>
          </div>
        </div>
      </aside>

      <section class="popup-aviso" id="popup-aviso">
        <div class="content-popup-aviso">
          <div class="header-popup-aviso">
            <p class="title">DESEJA EXCLUIR ESSE VEÍCULO ?</p>
          </div>
          <div class="descrição-popup-aviso">
            <p>
              Este veículo será excluído permanentemente, não podendo
              recuperá-lo depois.
            </p>
          </div>
          <div class="action-btn-aviso" >
            <button class="btn-action-aviso" onclick="closePopup()">
              Cancelar
            </button>
            <a href="../../assets/php/excluirVeiculo.php?id=<?php echo($idCarro) ?> " class="btn-action-aviso btn-delete">Excluir</a>
            
          </div>
        </div>
      </section>

      <section class="container-body">
        <div class="content-body">
          <header class="header-body">
            <div class="content-info-veiculo">
              <p class="title">ID: <?php echo($dt_car['id_carro']) ?></p>
              <h3 class="title"><?php echo($dt_car['marca'] . ' ' . $dt_car['modelo']) ?></h3>
              <p><?php echo($dt_car['motor'] . ' ' . $dt_car['versao']) ?></p>
              <span class="<?php echo($dt_car['status']) ?>"><?php echo($dt_car['status']) ?></span>
            </div>
            <div class="content-actions">
              <a href="http://localhost/sistemadecarro/admin/pages/editar-veiculo/?id=<?php echo($dt_car['id_carro']) ?>" class="botao-primario">
                <i class="ri-pencil-line"></i>
                Editar Veículo
              </a>
              <a href="../../assets/php/vendaVeiculo.php?id=<?php echo($idCarro) ?> " class="action-btn" data-tooltip="Marcar como vendido">
                <i class="ri-money-dollar-circle-line icon-action-sale"></i>
              </a>
              <button
                class="action-btn-excluir"
                onclick="openPopup()"
                data-tooltip="Excluir veículo"
              >
                <i class="ri-delete-bin-line icon-action-delete"></i>
              </button>
              <script src="app.js"></script>
            </div>
          </header>

          <div class="content-fotos-veiculo">
            <header class="">
              <p class="subtitle-body">FOTOS DO VEÍCULO</p>
            </header>
            <div class="fotos-veiculo">
              <?php
                foreach($fotos as $foto){
                  echo("<img src=\"../../../imagens/{$foto['path']}\" alt=\"\" />");
                }
              ?>
              
            </div>
          </div>

          <div class="content-dados-veiculos">
            <header class="">
              <p class="subtitle-body">DADOS DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Placa</label>
                <input readonly type="text" value="<?php echo($dt_car['placa']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Marca</label>
                <input readonly type="text" value="<?php echo($dt_car['marca']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Modelo do Veículo</label>
                <input readonly type="text" value="<?php echo($dt_car['modelo']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Versão do veiculo</label>
                <input
                  readonly
                  type="text"
                  value="<?php echo($dt_car['versao']) ?>"
                  class="input-dados"
                />
              </div>
              <div class="input-group">
                <label for="">Ano do Veículo</label>
                <input readonly type="text" value="<?php echo($dt_car['ano']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Valor do Veículo</label>
                <input readonly type="text" value="R$ <?php
                 $valor = number_format($dt_car["valor"], 2,',', '.');
                echo($valor) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Status</label>
                <input readonly type="text" value="<?php echo($dt_car['status']) ?>" class="input-dados" />
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DADOS MECÂNICOS DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Motor</label>
                <input readonly type="text" value="<?php echo($dt_car['motor']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Carroceria</label>
                <input readonly type="text" value="<?php echo($dt_car['carroceria']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Quilometragem</label>
                <input readonly type="text" value="<?php echo($dt_car['quilometragem']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Combustível</label>
                <input readonly type="text" value="<?php echo($dt_car['combustivel']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Câmbio</label>
                <input readonly type="text" value="<?php echo($dt_car['cambio']) ?>" class="input-dados" />
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DADOS ESTÉTICA DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Cor</label>
                <input readonly type="text" value="<?php echo($dt_car['cor']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Portas</label>
                <input readonly type="text" value="<?php echo($dt_car['portas']) ?> portas" class="input-dados" />
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DIGA MAIS SOBRE O VEICULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Sobre o veiculo</label>
                <textarea class="text-sobre" readonly rows="4" cols="50"><?php echo($dt_car['sobre']) ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
