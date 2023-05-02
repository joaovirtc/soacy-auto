
<?php
// carregando dependencias
include_once('./assets/conn.php');
session_start();

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
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />
  </head>
  <body>
    <main class="layout">
      <aside class="sidebar">
        <div class="content-sidebar">
          <div class="header-sidebar">
            <p>LOGO</p>
          </div>
          <div class="menu">
            <div class="menu-principal">
              <div>
                <p class="title-small">Menu Principal</p>
              </div>
              <div class="nav-link active">
                <i class="ri-function-line icon-nav-link"></i>
                <p class="title-nav-link">Dashboard</p>
              </div>
              <div class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </div>
              <div class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </div>
            </div>
            <a href="./assets/php/logout.php" class="nav-link"><!-- esse link leva ao processo de logout com php -->
            
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
              <img src="../../assets/img/logo-Icon-Preto 1.png" alt="" />
              <p class="title">SoacyCars</p>
            </div>
            <div>
              <button class="botao-primario">
                <i class="ri-add-line icon-botao"></i>
                Novo Veículo
              </button>
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
                  <i class="ri-car-line icon-card"></i>
                  <p class="title-card">Total veículos cadastrados</p>
                </div>
                <div class="content-card">
                  <div>
                    <p class="descriçao-card">60 Veículos</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+60</p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
              <!-- CARD -->
              <div class="card-visao-geral">
                <div class="header-card">
                  <i class="ri-money-dollar-circle-line icon-card"></i>
                  <p class="title-card">Total veículos vendidos</p>
                </div>
                <div class="content-card">
                  <div>
                    <p class="descriçao-card">6 Veículos</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+R$ 109.770,00</p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
              <!-- CARD -->
              <div class="card-visao-geral">
                <div class="header-card">
                  <i class="ri-exchange-dollar-line icon-card"></i>
                  <p class="title-card">Faturamento</p>
                </div>
                <div class="content-card">
                  <div>
                    <p class="descriçao-card">R$ 109.880,90</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+23,80%</p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>