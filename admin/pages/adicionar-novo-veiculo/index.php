<?php
// carregando dependencias
include_once('../../assets/conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adicionar novo veículo</title>
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
      String.prototype.reverse = function () {
        return this.split("").reverse().join("");
      };

      function mascaraMoeda(campo, evento) {
        var tecla = !evento ? window.event.keyCode : evento.which;
        var valor = campo.value.replace(/[^\d]+/gi, "").reverse();
        var resultado = "";
        var mascara = "##.###.###,##".reverse();
        for (var x = 0, y = 0; x < mascara.length && y < valor.length; ) {
          if (mascara.charAt(x) != "#") {
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
      function mascaraQuilom(campo, evento) {
        var tecla = !evento ? window.event.keyCode : evento.which;
        var valor = campo.value.replace(/[^\d]+/gi, "").reverse();
        var resultado = "";
        var mascara = "###.###.###".reverse();
        for (var x = 0, y = 0; x < mascara.length && y < valor.length; ) {
          if (mascara.charAt(x) != "#") {
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
    <?php 
                if(isset($_SESSION['msgError'])){
                  echo("
                  <!-- MESAGEM ERRO  -->
                  <div class=\"menssagem-erro\">
                    <i class=\"ri-error-warning-line icon-mensagem-erro\"></i>
                    <p class=\"title-mensagem-erro\">Erro ao adicionar veículo</p>
                    <span class=\"notificantion__progress-erro\"></span>
                  </div>
                  <!-- MESAGEM  ERRO -->
                  ");
                  unset($_SESSION['msgError']);
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
        <form
          class="content-body"
          action="../../assets/php/adicionar-veiculo.php"
          method="post"
          enctype="multipart/form-data"
        >
          <header class="header-body">
            <div class="content-info-veiculo">
              <p class="title">Adicionar novo veículo</p>
            </div>
            <div class="content-actions">
              <input
                type="submit"
                class="botao-primario submit"
                value="Adicionar Veículo"
              />
            </div>
          </header>

          <header class="">
            <p class="subtitle-body">FOTOS DO VEÍCULO</p>
          </header>
          <div class="content-fotos-veiculo">
            <div class="fotos-veiculo">
              <!-- <label class="botao-primario" for="arquivo">
                <i class="ri-upload-cloud-2-line"></i>
                Escolher aquivos</label
              > -->
              <input
                type="file"
                class="input-enviar-arquivos"
                name="arquivo[]"
                id="arquivo"
                multiple="multiple"
                accept=".jpeg,.png,.webp"
              />
            </div>
          </div>

          <div class="content-dados-veiculos">
            <header class="">
              <p class="subtitle-body">DADOS DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="placa">Placa</label>
                <input
                  name="placa"
                  oninput="handleInput(event)"
                  type="text"
                  placeholder="Ex: MM4V272"
                  maxlength="7"
                  class="input-dados"
                />
              </div>
              <div class="input-group">
                <label for="">Marca</label>
                <select name="marca" id="" class="input-dados">
                  <option selected value=""></option>
                  <option value="Volkswagem">Volkswagem</option>
                  <option value="Fiat">Fiat</option>
                  <option value="Toytota">Toytota</option>
                  <option value="Renault">Renault</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Modelo do Veículo</label>
                <input
                  type="text"
                  placeholder="Ex: Gol"
                  name="modelo"
                  class="input-dados name"
                />
              </div>
              <div class="input-group">
                <label for="">Versão do veiculo</label>
                <input
                  type="text"
                  placeholder="Ex: G3"
                  name="versao"
                  class="input-dados versao"
                />
              </div>
              <div class="input-group">
                <label for="">Ano do Veículo</label>
                <select name="ano" id="" class="input-dados">
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                  <option value="2020">2020</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Valor do Veículo</label>
                <input
                  name="valor"
                  type="text"
                  size="12"
                  name="valor"
                  onKeyUp="mascaraMoeda(this, event)"
                  value=""
                  class="input-dados"
                />
              </div>
              <div class="input-group">
                <label for="">Status</label>
                <select name="status" id="" class="input-dados">
                  <option selected value="online">online</option>
                  <option value="offline">offline</option>
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
                  <option value="3.0">3.0</option>
                  <option value="2.0">2.0</option>
                  <option value="1.5">1.5</option>
                  <option selected value="1.0">1.0</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Carroceria</label>
                <select name="carroceria" id="" class="input-dados">
                  <option value="Sedan">Sedan</option>
                  <option value="SUV">SUV</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Quilometragem</label>
                <input
                  type="text"
                  placeholder="Ex: 162.000"
                  onKeyUp="mascaraQuilom(this, event)"
                  name="quilometragem"
                  class="input-dados"
                />
              </div>
              <div class="input-group">
                <label for="">Combustível</label>
                <select name="combustivel" id="" class="input-dados">
                  <option value="Gasolina">Gasolina</option>
                  <option value="Eletrico">Eletrico</option>
                </select>
              </div>
              <div class="input-group">
                <label for="">Câmbio</label>
                <select name="cambio" id="" class="input-dados">
                  <option value="Automático">Automático</option>
                  <option value="Manual">Manual</option>
                </select>
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DADOS ESTÉTICA DO VEÍCULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Cor</label>
                <input type="text" value="" name="cor" class="input-dados" />
              </div>
              <div class="input-group">
                <label for="">Portas</label>
                <select name="portas" id="" class="input-dados">
                  <option value="2">2 portas</option>
                  <option selected value="4">4 Portas</option>
                  <option value="6">6 Portas</option>
                </select>
              </div>
            </div>
            <header class="header-dados-veiculo">
              <p class="subtitle-body">DIGA MAIS SOBRE O VEICULO</p>
            </header>
            <div class="dados-veiculo">
              <div class="input-group">
                <label for="">Sobre o veiculo</label>
                <textarea
                  name="sobre"
                  class="text-sobre"
                  rows="4"
                  cols="50"
                ></textarea>
              </div>
            </div>
          </div>
        </form>
      </section>
    </main>
  </body>
</html>
