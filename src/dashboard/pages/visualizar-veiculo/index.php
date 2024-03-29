<?php 

// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php');
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
      rel="shortcut icon"
      href="../../../assets/img/icons_logos/favicon.ico"
      type="image/x-icon"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <script>
      (function(window) { 
  'use strict'; 
 
var noback = { 
	 
	//globals 
	version: '0.0.1', 
	history_api : typeof history.pushState !== 'undefined', 
	 
	init:function(){ 
		window.location.hash = '#no-back'; 
		noback.configure(); 
	}, 
	 
	hasChanged:function(){ 
		if (window.location.hash == '#no-back' ){ 
			window.location.hash = '#jxTfmvt2cO2HCOzOOXodzPhGQ5o1Ngxdkf55X6e7d30';
			//mostra mensagem que não pode usar o btn volta do browser
			if($( "#msgAviso" ).css('display') =='none'){
				$( "#msgAviso" ).slideToggle("slow");
			}
		} 
	}, 
	 
	checkCompat: function(){ 
		if(window.addEventListener) { 
			window.addEventListener("hashchange", noback.hasChanged, false); 
		}else if (window.attachEvent) { 
			window.attachEvent("onhashchange", noback.hasChanged); 
		}else{ 
			window.onhashchange = noback.hasChanged; 
		} 
	}, 
	 
	configure: function(){ 
		if ( window.location.hash == '#no-back' ) { 
			if ( this.history_api ){ 
				history.pushState(null, '', '#jxTfmvt2cO2HCOzOOXodzPhGQ5o1Ngxdkf55X6e7d30'); 
			}else{  
				window.location.hash = '#jxTfmvt2cO2HCOzOOXodzPhGQ5o1Ngxdkf55X6e7d30';
				//mostra mensagem que não pode usar o btn volta do browser
				if($( "#msgAviso" ).css('display') =='none'){
					$( "#msgAviso" ).slideToggle("slow");
				}
			} 
		} 
		noback.checkCompat(); 
		noback.hasChanged(); 
	} 
	 
	}; 
	 
	// AMD support 
	if (typeof define === 'function' && define.amd) { 
		define( function() { return noback; } ); 
	}  
	// For CommonJS and CommonJS-like 
	else if (typeof module === 'object' && module.exports) { 
		module.exports = noback; 
	}  
	else { 
		window.noback = noback; 
	} 
	noback.init();
}(window)); 
    </script>
    <main class="layout" id="openFormActiveOpacity">
    <?php 
        if(isset($_SESSION['msgSucess'])){
          echo("
            <!-- MESAGEM SUCESSO  -->
            <div class=\"menssagem-sucesso\">
              <i class=\"ri-check-line icon-mensagem-sucesso\"></i>
              <p class=\"title-mensagem-sucesso\">{$_SESSION['msgSucess']}</p>
              <span class=\"notificantion__progress-sucesso\"></span>
            </div>
            <!-- MESAGEM SUCESSO -->
          ");
          unset($_SESSION['msgSucess']);
        }
      ?>
      <aside class="sidebar">
        <div class="content-sidebar">
          <div class="header-sidebar">
          <img src="../../../assets/img/icons_logos/logo.svg" alt="Logo soacy auto" width="100" heigth="100">
          </div>
          <div class="menu">
            <div class="menu-principal">
              <div>
                <p class="title-small-sidebar">Menu Principal</p>
              </div>
              <a href="http://localhost/sistemadecarro/" class="nav-link">
                <i class="ri-function-line icon-nav-link"></i>
                <p class="title-nav-link">Dashboard</p>
              </a>
              <a href="http://localhost/sistemadecarro/src/dashboard/pages/estoque/" class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a href="http://localhost/sistemadecarro/src/dashboard/pages/financeiro/" class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </a>
              <a href="http://localhost/sistemadecarro/src/dashboard/pages/gerenciar-leads/" class="nav-link">
                <i class="ri-team-line icon-nav-link"></i>
                <p class="title-nav-link">Gerenciamento de Leads</p>
              </a>
            </div>
            <a href="http://localhost/sistemadecarro/src/assets/php/logout.php" class="nav-link"
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
            <a href="./excluirVeiculo.php?id=<?php echo($idCarro) ?> " class="btn-action-aviso btn-delete">Excluir</a>
            
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
              <?php
                if($dt_car['status'] != 'vendido'){
                  echo("
                  <a href=\"http://localhost/sistemadecarro/src/dashboard/pages/editar-veiculo/?id={$dt_car['id_carro']}\" class=\"botao-primario\">
                    <i class=\"ri-pencil-line\"></i>
                    Editar Veículo
                  </a>
                  <a href=\"./vendaVeiculo.php?id=${idCarro}\" class=\"action-btn\" data-tooltip=\"Marcar como vendido\">
                    <i class=\"ri-money-dollar-circle-line icon-action-sale\"></i>
                  </a>
                  ");
                }
              ?>
              
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
                  echo("<img src=\"/sistemadecarro/src/assets/img/imagens_veiculos/{$foto['path']}\" alt=\"\" />");
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
              <p class="subtitle-body">DADOS ADICIONAIS DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Adicionais</label>
                <textarea class="text-sobre" readonly rows="4" cols="50"><?php echo($dt_car['sobre']) ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
