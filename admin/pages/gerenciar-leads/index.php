<?php
// carregando dependencias
include_once('../../assets/conn.php');
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
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
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
              <a href="../estoque/" class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a href="../financeiro/" class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </a>
              <a href="" class="nav-link active">
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
                          <a class=\"msg-whatsapp\" data-tooltip=\"Enviar mesangem via Whatsapp\" target=\"_blank\" href=\"https://api.whatsapp.com/send?phone={$leads['telefone']}&text=Olá {$leads['nome']}.\">
                            
                              <img
                                src=\"../../assets/img/WhatsApp logo.png\"
                                alt=\"\"
                                width=\"30px\"
                                height=\"30px\"
                              />
                            </a>
                            <a href=\"../../assets/php/vistoLead.php?id={$leads['id']}\">
                              <i class=\"ri-check-double-line icon-marcar-como-visto\"></i>
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
                          <a target=\"_blank\" href=\"https://api.whatsapp.com/send?phone={$leads['telefone']}&text=Olá {$leads['nome']}.\">
                            <img
                              src=\"../../assets/img/WhatsApp logo.png\"
                              alt=\"\"
                              width=\"30px\"
                              height=\"30px\"
                            />
                          </a>
                          
                          <button class=\"button-marcar-como-visto\" disabled>
                            <i class=\"ri-check-double-line icon-visto\"></i>
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
  </body>
</html>
