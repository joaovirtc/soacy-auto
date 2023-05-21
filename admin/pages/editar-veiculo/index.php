<?php
// carregando dependencias
include_once('../../assets/conn.php');
session_start();


//variaveis
$idCarro = $_GET['id'];
$raiz = $_SERVER['DOCUMENT_ROOT'] . "/sistemadecarro/";

// query's

$veiculo = $conn->query("SELECT * from carro where id_carro = $idCarro;");
$dt_car = mysqli_fetch_array($veiculo);
$fotos = $conn->query("SELECT * from foto where id_carro = $idCarro");


// codigo

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
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
  <script>
          String.prototype.reverse = function(){
          return this.split('').reverse().join(''); 
        };

        function mascaraMoeda(campo,evento){
          var tecla = (!evento) ? window.event.keyCode : evento.which;
          var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
          var resultado  = "";
          var mascara = "##.###.###,##".reverse();
          for (var x=0, y=0; x<mascara.length && y<valor.length;) {
            if (mascara.charAt(x) != '#') {
              resultado += mascara.charAt(x);
              x++;
            } else {
              resultado += valor.charAt(y);
              y++;
              x++;
            }
          }
          campo.value = resultado.reverse();
        }
        function mascaraQuilom(campo,evento){
          var tecla = (!evento) ? window.event.keyCode : evento.which;
          var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
          var resultado  = "";
          var mascara = "###.###.###".reverse();
          for (var x=0, y=0; x<mascara.length && y<valor.length;) {
            if (mascara.charAt(x) != '#') {
              resultado += mascara.charAt(x);
              x++;
            } else {
              resultado += valor.charAt(y);
              y++;
              x++;
            }
          }
          campo.value = resultado.reverse();
        }
        function handleInput(e) {
          var ss = e.target.selectionStart;
          var se = e.target.selectionEnd;
          e.target.value = e.target.value.toUpperCase();
          e.target.selectionStart = ss;
          e.target.selectionEnd = se;
        }
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

      <section class="container-body">
        <form action="../../assets/php/editarVeiculo.php?id=<?php echo($idCarro) ?>" method="post" class="content-body">
          <header class="header-body">
            <div class="content-info-veiculo">
              <p class="title">ID: <?php echo($dt_car['id_carro']) ?></p>
              <h3 class="title"><?php echo($dt_car['marca'] . ' ' . $dt_car['modelo']) ?></h3>
              <p><?php echo($dt_car['versao'] . ' ' . $dt_car['motor']) ?></p>
              <span class="<?php echo($dt_car['status']) ?>"><?php echo($dt_car['status']) ?></span>
            </div>
            <div class="content-actions">
              <input
                type="submit"
                class="botao-primario submit"
                value="Salvar Alterações"
              />
            </div>
          </header>

          <header class="">
            <p class="subtitle-body">FOTOS DO VEÍCULO</p>
          </header>
          <div class="content-fotos-veiculo">
            <div class="fotos-veiculo">
              <?php 
                foreach($fotos as $foto){
                  echo("
                  <div class=\"div\">
                   <a href=\"../../assets/php/apagarImg.php?id={$foto['id_foto']}\" class=\"btn-deletar-foto\">
                      <i class=\"ri-delete-bin-line\"></i>
                   </a>
                   <img src=\"../../../imagens/{$foto["path"]}\" alt=\"veiculo {$dt_car["marca"]}\" />
                 </div>
                  ");
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
                <input name="placa" type="text" oninput="handleInput(event)" maxlength="7" value="<?php echo($dt_car['placa']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Marca</label>
                <select name="marca" id="" class="input-dados">
                  <option <?php echo ($dt_car['marca'] == "Volkswagem") ? "selected" : '' ?> value="Volkswagem">Volkswagem</option>
                  <option <?php echo ($dt_car['marca'] == "Fiat") ? "selected" : '' ?> value="Fiat">Fiat</option>
                  <option <?php echo ($dt_car['marca'] == "Toytota") ? "selected" : '' ?> value="Toytota">Toytota</option>
                  <option <?php echo ($dt_car['marca'] == "Renault") ? "selected" : '' ?> value="Renault">Renault</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Modelo do Veículo</label>
                <input name="modelo" type="text" value="<?php echo($dt_car['modelo']) ?>" class="input-dados name" />
              </div>
              <div class="input-group">
                <label for="">Versão do veiculo</label>
                <input
                name="versao"
                  type="text"
                  value="<?php echo($dt_car['versao']) ?>"
                  class="input-dados versao"
                />
              </div>
              <div class="input-group">
                <label for="">Ano do Veículo</label>
                <select name="ano" id="" class="input-dados">
                  <option <?php echo ($dt_car['ano'] == "2023") ? "selected" : '' ?> value="2023">2023</option>
                  <option <?php echo ($dt_car['ano'] == "2022") ? "selected" : '' ?> value="2022">2022</option>
                  <option <?php echo ($dt_car['ano'] == "2021") ? "selected" : '' ?> value="2021">2021</option>
                  <option <?php echo ($dt_car['ano'] == "2020") ? "selected" : '' ?> value="2020">2020</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Valor do Veículo</label>
                <input name="valor" type="text" onKeyUp="mascaraMoeda(this, event)" value="R$ <?php
                 $valor = number_format($dt_car["valor"], 2,',', '.');
                echo($valor) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Status</label>
                <select name="status" id="" class="input-dados">
                  <option <?php echo ($dt_car['status'] == "online") ? "selected" : '' ?>  value="online">online</option>
                  <option <?php echo ($dt_car['status'] == "offline") ? "selected" : '' ?> value="offline">offline</option>
                </select>
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DADOS MECÂNICOS DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Motor</label>
                <select name="motor" id="" class="input-dados">
                  <option <?php echo ($dt_car['motor'] == "3.0") ? "selected" : '' ?> value="3.0">3.0</option>
                  <option <?php echo ($dt_car['motor'] == "2.0") ? "selected" : '' ?> value="2.0">2.0</option>
                  <option <?php echo ($dt_car['motor'] == "1.5") ? "selected" : '' ?> value="1.5">1.5</option>
                  <option <?php echo ($dt_car['motor'] == "1.0") ? "selected" : '' ?> value="1.0">1.0</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Carroceria</label>
                <select name="carroceria" id="" class="input-dados">
                  <option <?php echo ($dt_car['carroceria'] == "Sedan") ? "selected" : '' ?> value="Sedan">Sedan</option>
                  <option <?php echo ($dt_car['carroceria'] == "SUV") ? "selected" : '' ?> value="SUV">SUV</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Quilometragem</label>
                <input name="quilometragem" type="text" onKeyUp="mascaraQuilom(this, event)" value="<?php echo($dt_car['quilometragem']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Combustível</label>
                <select name="combustivel" id="" class="input-dados">
                  <option <?php echo ($dt_car['combustivel'] == "Gasolina") ? "selected" : '' ?> value="Gasolina">Gasolina</option>
                  <option <?php echo ($dt_car['combustivel'] == "Eletrico") ? "selected" : '' ?> value="Eletrico">Eletrico</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Câmbio</label>
                <select name="cambio" id="" class="input-dados">
                  <option <?php echo ($dt_car['cambio'] == "Automático") ? "selected" : '' ?> value="Automático">Automático</option>
                  <option <?php echo ($dt_car['cambio'] == "Manual") ? "selected" : '' ?> value="Manual">Manual</option>
                </select>
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DADOS ESTÉTICA DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Cor</label>
                <input name="cor" type="text" value="<?php echo($dt_car['cor']) ?>" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Portas</label>
                <select name="portas" id="" class="input-dados">
                  <option <?php echo ($dt_car['portas'] == "2") ? "selected" : '' ?> value="4">2 portas</option>
                  <option <?php echo ($dt_car['portas'] == "4") ? "selected" : '' ?> value="2">4 portas</option>
                  <option <?php echo ($dt_car['portas'] == "6") ? "selected" : '' ?> value="6">6 Portas</option>
                </select>
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DIGA MAIS SOBRE O VEICULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Sobre o veiculo</label>
                <textarea name="sobre" class="text-sobre" rows="4" cols="50"><?php echo($dt_car['sobre']) ?></textarea>
              </div>
            </div>
          </div>
        </form>
      </section>
    </main>
  </body>
</html>
