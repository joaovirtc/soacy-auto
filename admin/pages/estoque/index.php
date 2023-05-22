<?php
// carregando dependencias
include_once('../../assets/conn.php');
session_start();



//variaveis
$selected = isset($_GET["ordenar"]) ? $_GET["ordenar"] : "mais recente";
// codigo

if(!isset($_SESSION["userID"])){
  header('location: http://localhost/sistemadecarro/admin/pages/singin');
}
  // query´s
  if($selected == "mais recente"){
    $dt_registros = $conn->query("SELECT * from carro where status = 'online' or status = 'offline' ORDER BY `carro`.`id_carro` DESC");
  }
  elseif($selected == "maior valor"){
    $dt_registros = $conn->query("SELECT * from carro where status = 'online' or status = 'offline' ORDER BY `carro`.`valor` DESC");
  }
  elseif($selected == "menor valor"){
    $dt_registros = $conn->query("SELECT * from carro where status = 'online' or status = 'offline' ORDER BY `carro`.`valor` ASC");
  }
  elseif($selected == "ano"){
    $dt_registros = $conn->query("SELECT * from carro where status = 'online' or status = 'offline' ORDER BY `carro`.`ano` DESC");
  }
  else{
    $dt_registros = $conn->query("SELECT * from carro where status = 'online' or status = 'offline' ORDER BY `carro`.`id_carro` DESC");
  }


?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Estoque</title>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css" />
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
			window.location.hash = '#BLOQUEIO';
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
				history.pushState(null, '', '#BLOQUEIO'); 
			}else{  
				window.location.hash = '#BLOQUEIO';
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
    <main class="layout">
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
              <a href="../../pages/estoque/" class="nav-link active">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a href="../../pages/financeiro/" class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </a>
              <a href="../../pages/gerenciar-leads/" class="nav-link">
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
      <section class="container-body">
        <div class="content-body">
          <header class="header-body">
            <div class="content-logo-concessionaria">
              <img src="./assets/img/logo-Icon-Pretabela" alt="" />
              <p class="title">Estoque</p>
            </div>
            <div>
              <a href="../adicionar-novo-veiculo/">
                <button class="botao-primario">
                  <i class="ri-add-line icon-botao"></i>
                  Adicionar Veículo
                </button>
              </a>
            </div>
          </header>

          <div class="container-tabela">
            <header class="header-title-tabela">
              <div>
                <p class="subtitle-body">TODOS OS VEíCULOS</p>
              </div>
              <div class="content-ordernar-por">
                <p class="subtitle-body">Ordernar por:</p>
                <form action="" method="get">
                <select name="ordenar" id="ordenar" onchange="this.form.submit()">
                  <option value="mais recente" <?php if($selected == "mais recente"){ echo("selected");} ?>>Mais recente</option>
                  <option value="maior valor" <?php if($selected == "maior valor"){ echo("selected");} ?>>Maior valor</option>
                  <option value="menor valor" <?php if($selected == "menor valor"){ echo("selected");} ?>>Menor valor</option>
                  <option value="ano" <?php if($selected == "ano"){ echo("selected");} ?>>Ano lançamento</option>
                </select>
                </form>
              </div>
            </header>
            <div class="content-tabela">
              <table>
                <!-- HEADER PLANILHA -->
                <tr class="header-tabela">
                  <th class="title-tabela ID">ID</th>
                  <th class="title-tabela Nome">Nome Veículo</th>
                  <th class="title-tabela Placa">Placa</th>
                  <th class="title-tabela Km">Preço</th>
                  <th class="title-tabela Ano">Ano</th>
                  <th class="title-tabela Status">Status</th>
                  <th class="title-tabela Ações"></th>
                </tr>
                <!-- HEADER PLANILHA -->

                <?php 
                  foreach($dt_registros as $registro){
                    $valor = number_format($registro["valor"], 2,',', '.');
                    echo("
                    <!-- DESCRIÇÃO PLANILHA -->
                    <tr>
                      <td class=\"descricao-tabela id\">{$registro["id_carro"]}</td>
                      <td class=\"descricao-tabela nome\">
                        {$registro["marca"]} {$registro["modelo"]} {$registro["versao"]}
                      </td>
                      <td class=\"descricao-tabela placa\">{$registro["placa"]}</td>
                      <td class=\"descricao-tabela km\">R$ {$valor}</td>
                      <td class=\"descricao-tabela ano\">{$registro["ano"]}</td>
                      <td class=\"descricao-tabela status\">
                        <span class=\"status-{$registro["status"]}\">{$registro["status"]}</span>
                      </td>
                      <td class=\"descricao-tabela ações\">
                        <a class=\"edit\" href=\"../visualizar-veiculo?id={$registro["id_carro"]}\">
                          <i class=\"ri-pencil-line\"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- DESCRIÇÃO PLANILHA -->    
                    ");
                  }
                ?> 
                <!-- DESCRIÇÃO PLANILHA -->
                <!-- <tr>
                  <td class="descricao-tabela id">1</td>
                  <td class="descricao-tabela nome">
                    Mercedes-benz GLE 63 AMG
                  </td>
                  <td class="descricao-tabela placa">IAS-212</td>
                  <td class="descricao-tabela km">200.000</td>
                  <td class="descricao-tabela ano">2022</td>
                  <td class="descricao-tabela status">
                    <span class="status-off">offline</span>
                  </td>
                  <td class="descricao-tabela ações">
                    <a href="" class="edit">
                      <i class="ri-pencil-line"></i>
                    </a>
                  </td>
                </tr> -->
                <!-- DESCRIÇÃO PLANILHA -->
              </table>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
