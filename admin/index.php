<?php
// carregando dependencias
include_once('./assets/conn.php');
session_start();

// query's no banco de dados
  // numero de quantos carros tem registrado no banco de dados
  $qtd_veiculos_estq = mysqli_fetch_array($conn->query("select count(1) from carro where status != 'vendido'; "));
  // numero de veiculos adicionados esse mes
  $ano_atual = date('Y');
  $mes_atual = date('m');
  $hoje = date('Y-m-d');
  $hora_atual = date('H:i:s');
  // func de saudaçao
  function saudacao() {
    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('H');
    if( $hora >= 5 && $hora <= 12 )
      return 'Bom dia' ;
    else if ( $hora > 12 && $hora <=18)
      return 'Boa tarde';
    else
      return 'Boa noite';
  }
  $qtd_veiculos_mes = mysqli_fetch_array($conn->query("SELECT count(1) FROM carro WHERE YEAR(dt_cadastro) = '{$ano_atual}' AND MONTH(dt_cadastro) = '{$mes_atual}';"));
  // numero de veiculos vendidos esse mes
  $qtd_vendas_mes = $conn->query(" SELECT * FROM vendidos INNER JOIN carro ON vendidos.id_carro = carro.id_carro WHERE YEAR(dt_venda) = '{$ano_atual}' AND MONTH(dt_venda) = '{$mes_atual}';");
  $dt_registros = $conn->query("SELECT * from carro where status = 'online' or status = 'offline'  ORDER BY `carro`.`id_carro` desc");

  $qtd_leads = mysqli_fetch_array($conn->query(" SELECT count(1) from leads; "));
  $qtd_leads_hoje = mysqli_fetch_array($conn->query(" SELECT count(1) from leads WHERE date(info) = '{$hoje}'; "));
// definindo variaveis
  
$qtd_veiculos_estq = $qtd_veiculos_estq[0];
$qtd_veiculos_mes = $qtd_veiculos_mes[0];
$num_vendas_mes = mysqli_fetch_array($qtd_vendas_mes);
$num_vendas_mes = $qtd_vendas_mes->num_rows;
$vendas_mes = 0;
    foreach($qtd_vendas_mes as $venda){
    
      $vendas_mes = $vendas_mes + $venda["valor"];
      
    }
$vendas_mes = number_format($vendas_mes, 2,',', '.');



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
                <p class="title-small-sidebar">Menu Principal</p>
              </div>
              <a href="index.php" class="nav-link active">
                <i class="ri-function-line icon-nav-link"></i>
                <p class="title-nav-link">Dashboard</p>
              </a>
              <a href="./pages/estoque/" class="nav-link">
                <i class="ri-car-line icon-nav-link"></i>
                <p class="title-nav-link">Estoque</p>
              </a>
              <a href="./pages/financeiro/" class="nav-link">
                <i class="ri-money-dollar-circle-line icon-nav-link"></i>
                <p class="title-nav-link">Vendas</p>
              </a>
              <a href="./pages/gerenciar-leads/" class="nav-link">
                <i class="ri-team-line icon-nav-link"></i>
                <p class="title-nav-link">Gerenciamento de Leads</p>
              </a>
            </div>
            <a href="./assets/php/logout.php" class="nav-link"
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
              <p class="title"><?php echo(saudacao()) ?>, SoacyCars &#128075</p>
              
              
            </div>
            <a href="./pages/adicionar-novo-veiculo/">
              <button class="botao-primario">
                <i class="ri-add-line icon-botao"></i>
                Adicionar Veículo
              </button>
            </a>
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
                    <p class="descriçao-card"><?php echo($qtd_veiculos_estq) ?> Veículos</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+<?php echo($qtd_veiculos_mes) ?></p>
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
                    <p class="descriçao-card"><?php echo($num_vendas_mes) ?> Veículos</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+R$ <?php echo($vendas_mes) ?></p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
              <!-- CARD -->
              <div class="card-visao-geral">
                <div class="header-card">
                  <i class="ri-user-follow-line icon-card"></i>
                  <p class="title-card">Total novos leads</p>
                </div>
                <div class="content-card">
                  <div>
                    <p class="descriçao-card"><?php echo($qtd_leads[0])?> Leads</p>
                  </div>
                  <div class="descriçao-card-add">
                    <p>+<?php echo($qtd_leads_hoje[0])?> hoje</p>
                  </div>
                </div>
              </div>
              <!-- CARD -->
            </div>
          </div>
          <div class="container-tabela">
            <header class="">
              <p class="subtitle-body">Últimos veículos cadastrados</p>
            
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
                  <th class="title-tabela Ações">Ações</th>
                </tr>
                <!-- HEADER PLANILHA -->

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
                    <span class="status-online">online</span>
                  </td>
                  <td class="descricao-tabela ações">
                    <span class="edit">
                      <i class="ri-pencil-line"></i>
                    </span>
                  </td>
                </tr> -->
                <!-- DESCRIÇÃO PLANILHA -->
                <?php 
                  foreach($dt_registros as $registro){
                    echo("
                    <!-- DESCRIÇÃO PLANILHA -->
                    <tr>
                      <td class=\"descricao-tabela id\">{$registro["id_carro"]}</td>
                      <td class=\"descricao-tabela nome\">
                        {$registro["marca"]} {$registro["modelo"]} {$registro["versao"]}
                      </td>
                      <td class=\"descricao-tabela placa\">{$registro["placa"]}</td>
                      <td class=\"descricao-tabela km\">{$registro["quilometragem"]}</td>
                      <td class=\"descricao-tabela ano\">{$registro["ano"]}</td>
                      <td class=\"descricao-tabela status\">
                        <span class=\"status-{$registro["status"]}\">{$registro["status"]}</span>
                      </td>
                      <td class=\"descricao-tabela ações\">
                        <a class=\"edit\" href=\"./pages/visualizar-veiculo?id={$registro["id_carro"]}\">
                          <i class=\"ri-eye-line\"></i>
                          </a>
                      </td>
                    </tr>
                    <!-- DESCRIÇÃO PLANILHA -->    
                    ");
                  }
                ?>  
              </table>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
