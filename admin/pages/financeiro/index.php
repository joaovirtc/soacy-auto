<?php
// carregando dependencias
include_once('../../assets/conn.php');
session_start();

// query´s


$dt_registros = $conn->query(" SELECT * FROM vendidos INNER JOIN carro ON vendidos.id_carro = carro.id_carro ORDER BY `vendidos`.`dt_venda` DESC;");
$num_vendas = mysqli_fetch_array($dt_registros);
$num_vendas = $dt_registros->num_rows;
$vendas = 0;
    foreach($dt_registros as $venda){
    
      $vendas = $vendas + $venda["valor"];
      
    }
$vendas = number_format($vendas, 2,',', '.');

$qtd_vendas = mysqli_fetch_array($conn->query(" SELECT count(1) from vendidos; "));

//variaveis

// codigo

if(!isset($_SESSION["userID"])){
  header('location: http://localhost/sistemadecarro/admin/pages/singin');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Financeiro</title>
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
              <a href="../../pages/estoque/index.php" class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a
                href="../../pages/financeiro/"
                class="nav-link active"
              >
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
              <p class="title">Vendas</p>
            </div>
          </header>

          <div class="container-visao-geral">
            <div>
              <p class="subtitle-body">Visão Geral</p>
            </div>
            <div class="container-info-visao-geral">
              <!-- CARD -->
              <div class="card-visao-geral">
                <div class="header-card">
                  <i class="ri-money-dollar-circle-line icon-card"></i>
                  <p class="title-card">Total veículos vendidos</p>
                </div>
                <div class="content-card">
                  <div>
                    <p class="descriçao-card"><?php echo($qtd_vendas[0]) ?> Veículos</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+R$ <?php echo($vendas) ?></p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
            </div>
          </div>
          <div class="container-tabela">
            <header class="">
              <p class="subtitle-body">TODOS OS VEICULOS VENDIDOS</p>
            </header>
            <div class="content-tabela">
              <table>
                <!-- HEADER PLANILHA -->
                <tr class="header-tabela">
                  <th class="title-tabela ID">ID</th>
                  <th class="title-tabela Nome">Nome Veículo</th>
                  <th class="title-tabela Placa">Placa</th>
                  <th class="title-tabela Km">KM</th>
                  <th class="title-tabela Ano">Ano</th>
                  <th class="title-tabela Status">Status</th>
                  <th class="title-tabela Ações"></th>
                </tr>
                <!-- HEADER PLANILHA -->
                  <?php 
                  
                  foreach($dt_registros as $registro) {
                    echo("
                        <!-- DESCRIÇÃO PLANILHA -->
                        <tr>
                          <td class=\"descricao-tabela id\">{$registro["id_carro"]}</td>
                          <td class=\"descricao-tabela nome\">
                            {$registro['marca']} {$registro['modelo']}
                          </td>
                          <td class=\"descricao-tabela placa\">{$registro["placa"]}</td>
                          <td class=\"descricao-tabela km\">200.000</td>
                          <td class=\"descricao-tabela ano\">{$registro["ano"]}</td>
                          <td class=\"descricao-tabela status\">
                            <span class=\"status-sale\">vendido</span>
                          </td>
                          <td class=\"descricao-tabela ações\">
                            <a href=\"http://localhost/sistemadecarro/admin/visualizar-veiculo\" class=\"edit\">
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
                    <span class="status-sale">Vendido</span>
                  </td>
                  <td class="descricao-tabela ações">
                    <span class="edit">
                      <i class="ri-pencil-line"></i>
                    </span>
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
