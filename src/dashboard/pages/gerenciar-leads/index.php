<?php
// carregando dependencias
include_once($_SERVER['DOCUMENT_ROOT'].'/sistemadecarro/src/assets/php/conn.php');
session_start();

// query´s
$hoje = date('Y,m,d');
$ano_atual = date('Y');
$mes_atual = date('m');

$dt_leads = $conn->query(" SELECT * FROM leads ORDER BY info DESC;");


$qtd_leads = mysqli_fetch_array($conn->query(" SELECT count(1) from leads; "));
$qtd_leads_hoje = mysqli_fetch_array($conn->query(" SELECT count(1) from leads WHERE date(info) = '{$hoje}'; "));

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
    <title>Gerenciar Leads</title>
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
              <a href="http://localhost/sistemadecarro/src/dashboard/pages/estoque" class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a href="http://localhost/sistemadecarro/src/dashboard/pages/financeiro/" class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </a>
              <a href="" class="nav-link active">
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
      <section class="container-body">
        <div class="content-body">
          <header class="header-body">
            <div class="content-header-body">
              <div>
                <p class="title">Gerenciamento de leads</p>
              </div>
              <div>
                <a href="" class="botao-primario">
                  <i class="ri-loop-left-line"></i>
                  Atualizar Leads
                </a>
              </div>
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
                  <i class="ri-user-follow-line icon-card"></i>
                  <p class="title-card">Total de leads capturados</p>
                </div>
                <div class="content-card">
                  <div>
                    <p class="descriçao-card">
                      <?php echo($qtd_leads[0]) ?>
                      leads
                    </p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>
                      <?php echo('+' . $qtd_leads_hoje[0])?>
                      hoje
                    </p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
            </div>
          </div>
          <div class="container">
            <header class="">
              <p class="subtitle-body">TODOS OS LEADS</p>
            </header>
            <div class="content-leads">
              <?php 
                  foreach($dt_leads as $leads){
                    if($leads['visto'] == '0'){
                      echo("
                                <!-- CONTAINER LEADS NOVOS  -->
                        <div class=\"container-leads-novo\">
                          <div class=\"informações-leads\">
                            <div class=\"lead-novo\">NOVO</div>
                            <div class=\"row\">
                              <p class=\"nome-lead\">{$leads['nome']}</p>
                            </div>
                            <div class=\"row\">
                              <i class=\"ri-mail-line\"></i>
                              <p class=\"email-lead\">{$leads['email']}</p>
                            </div>
                            <div class=\"row\">
                              <i class=\"ri-phone-line\"></i>
                              <p class=\"telefone-lead\">{$leads['telefone']}</p>
                            </div>
                            <div class=\"row\">
                              <p class=\"mensagem-lead\">
                              {$leads['mensagem']}
                              </p>
                            </div>
                          </div>
                          <div class=\"action-leads\">
                          <a id=\"link-whats-ver\" class=\"link\" data-tooltip=\"Enviar mesangem via Whatsapp\" target=\"_blank\" href=\"./leadVisto.php?telefone={$leads['telefone']}&nome={$leads['nome']}&id={$leads['id']}\">
                              <img
                                src=\"http://localhost/sistemadecarro/src\assets\img\icons_logos\WhatsApp logo.png\"
                                alt=\"\"
                                width=\"30px\"
                                height=\"30px\"
                              />
                              <span class=\"tooltiptext\">Enviar mensagem</span>
                            </a>
                            <a class=\"link\" href=\"./vistoLead.php?id={$leads['id']}\">
                              <i class=\"ri-check-double-line icon-marcar-como-visto\"></i>
                              <span class=\"tooltiptext\">Marcar como visto</span>
                            </a>
                          </div>
                        </div>
                        <!-- CONTAINER LEADS NOVOS -->
                      ");
                    }
                    if($leads['visto'] == '1'){
                      echo("
                      <!-- CONTAINER LEADS  -->
                      <div class=\"container-leads\">
                        <div class=\"informações-leads\">
                          <div class=\"row\">
                            <p class=\"nome-lead\">{$leads['nome']}</p>
                          </div>
                          <div class=\"row\">
                            <i class=\"ri-mail-line\"></i>
                            <p class=\"email-lead\">{$leads['email']}</p>
                          </div>
                          <div class=\"row\">
                            <i class=\"ri-phone-line\"></i>
                            <p class=\"telefone-lead\">{$leads['telefone']}</p>
                          </div>
                          <div class=\"row\">
                            <p class=\"mensagem-lead\">
                            {$leads['mensagem']}
                            </p>
                          </div>
                        </div>
                        <div class=\"action-leads\">
                          <a class=\"link\" target=\"_blank\" href=\"https://api.whatsapp.com/send?phone={$leads['telefone']}&text=Olá {$leads['nome']}.\">
                            <img
                              src=\"http://localhost/sistemadecarro/src\assets\img\icons_logos\WhatsApp logo.png\"
                              alt=\"\"
                              width=\"30px\"
                              height=\"30px\"
                            />
                            <span class=\"tooltiptext\">Enviar mensagem</span>
                          </a>

                          
                          <button class=\"button-marcar-como-visto link\" >
                            <i class=\"ri-check-double-line icon-visto\"></i>
                            <span class=\"tooltiptext\">Marcado como visto</span>
                          </button>
                          
                        </div>
                      </div>
                      <!-- CONTAINER LEADS  -->
                      ");
                    }
                  }
              ?>
              

             
            </div>
          </div>
        </div>
      </section>
    </main>
    <script>

var el =document.getElementById("link-whats-ver");
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
  el.addEventListener("click", function() {
    sleep(300).then(() => {
   location.reload();
});
    
});

</script>
  </body>
</html>
