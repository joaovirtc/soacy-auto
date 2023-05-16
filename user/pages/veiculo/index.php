<?php
include_once('../../assets/conn.php');
$id = $_GET['id'];


// definiçoes para usar na pagina
$dt_carro =  $conn->query("SELECT * FROM carro where id_carro=$id;");
$dt_car = mysqli_fetch_array($dt_carro);

$valor = $dt_car['valor'];
$valor = number_format($valor, 2,',', '.');

$dt_ft = $conn->query("SELECT * FROM foto where id_carro=$id;");
$dt_adicional = $conn->query("SELECT * FROM adicional where id_carro=$id;");
$dt_adc = mysqli_fetch_array($dt_adicional);

$carroceria = $dt_car['carroceria'];
$cambio = $dt_car['cambio'];

$dt_similar =  $conn->query("SELECT * FROM carro where carroceria = '$carroceria' and id_carro != $id or marca = '$cambio' and id_carro != $id LIMIT 3;");


?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <title><?php echo($dt_car['modelo'] . ' ' . $dt_car['versao']); ?></title>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="toggle-btn-open">
          <i class="ri-menu-line"></i>
        </div>
        <div class="logo"><a href="./index.html">LOGO</a></div>
        <div>
          <ul class="list-links">
            <li><a class="nav-link" href="./index.html">Início</a></li>
            <li>
              <a class="nav-link" href="./pages/veiculos/index.html"
                >Veículos</a
              >
            </li>
            <li>
              <a class="nav-link" href="./pages/empresa/index.html">Empresa</a>
            </li>
          </ul>
        </div>
        <a href="./pages/contato/index.html" class="action-btn">
          <i class="ri-whatsapp-line"></i>
          <p>Entrar em contato</p>
        </a>
      </nav>
      <nav class="dropdown-menu">
        <li><a href="./index.html" class="nav-link">Início</a></li>
        <li>
          <a href="./pages/veiculos/index.html" class="nav-link">Veículos</a>
        </li>
        <li>
          <a href="./pages/empresa/index.html" class="nav-link">Empresa</a>
        </li>
        <a href="./pages/contato/index.html" class="action-btn">
          <i class="ri-whatsapp-line"></i>
          <p>Entrar em contato</p>
        </a>
      </nav>
      <script src="../../assets/js/main.js"></script>
    </header>

    <section class="popup-form" id="popup-form">
      <div class="content-popup-form">
        <div class="header-popup-form">
          <p class="title-descrição-carro">Contate o vendedor</p>
          <button class="close-popup-form" onclick="closePopupForm()">
            <i class="ri-close-fill icon-close"></i>
          </button>
        </div>
        <form action="" class="popup-form-mensagem" id="formBody">
          <div class="container-input">
            <span class="span-required">Informe seu nome</span>
            <input
              type="text"
              class="input-form-mensagem nome requiredInput"
              placeholder="Nome"
              oninput="nameValidate()"
            />
          </div>
          <div class="container-input">
            <span class="span-required">Número Inválido</span>
            <input
              type="text"
              class="input-form-mensagem telefone requiredInput"
              placeholder="Telefone"
              onkeyup="handlePhone(event)"
              oninput="numeroValidate()"
              maxlength="15"
            />
          </div>
          <div class="container-input">
            <span class="span-required">Email Invalido</span>
            <input
              type="text"
              class="input-form-mensagem email requiredInput"
              placeholder="E-mail"
              oninput="emailValidate()"
            />
          </div>
          <textarea
            name=""
            id=""
            cols="30"
            rows="10"
            class="input-form-mensagem input-text-area"
            placeholder="Mensagem"
          >
Olá, vi seu veículo no seu site e tenho interesse. Aguardo seu contato!
        </textarea
          >
          <div>
            <p class="text-small-form">
              Ao clicar em "Enviar" você concorda com a nossa
              <a class="text-underline">politica de privacidade.</a>
            </p>
          </div>
          <input
            type="submit"
            class="input-submit-mensagem"
            value="Enviar mensagem"
          />
          <script src="../../assets/js/validaoFormOverlay.js"></script>
        </form>
      </div>
    </section>

    <main id="openFormActiveOpacity">
      <script src="./main.js"></script>
      <div class="container-header-info-veiculo">
        <div class="content-header-info-veiculo">
          <div>
            <h2 class="nome-header-veiculo"><?php echo($dt_car['marca'] . ' ' .$dt_car['modelo']) ?></h2>
            <h2 class="preço-header-veiculo"><?php echo('R$'.$valor); ?></h2>
            <p class="description-header-veiculo">
            <?php echo($dt_car['motor'].' '.$dt_car['modelo'].' '.$dt_car['versao'] . ' ' .$dt_car['ano']) ?>
            </p>
          </div>
          <div class="div-button-action-open-form">
            <button class="button-action-open-form" onclick="openPopupForm()">
              Enviar mensagem
            </button>
          </div>
        </div>
      </div>
      <div class="container-slider-img-carro">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              foreach($dt_ft as $ft){
                echo("
                  <div class=\"swiper-slide\">
                    <img 
                     src=\"../../../imagens/{$ft['path']}\" alt=\"imagem {$dt_car['modelo']}\" />
                  </div>
                ");
                
              }
            ?>
          </div>
          <div class="swiper-button-next">
            <i class="ri-arrow-right-line arrow-slider"></i>
          </div>
          <div class="swiper-button-prev">
            <i class="ri-arrow-left-line arrow-slider"></i>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

      <script>
        function swiperResponsive(param) {
          if (param.matches) {
            var swiper = new Swiper(".mySwiper", {
              slidesPerView: 1,

              spaceBetween: 1,
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
              // mousewheel: true,
              keyboard: true,
            });
          } else {
            var swiper = new Swiper(".mySwiper", {
              slidesPerView: 3,
              spaceBetween: 1,
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
              // mousewheel: true,
              keyboard: true,
            });
          }
        }

        var RESPONSIVE_MEDIA_QUERY_JS = window.matchMedia("(max-width: 900px)");
        swiperResponsive(RESPONSIVE_MEDIA_QUERY_JS);
        RESPONSIVE_MEDIA_QUERY_JS.addListener(swiperResponsive);
      </script>

      <div class="container-body-info-veiculo">
        <div class="content-body-info-veiculo">
          <div class="container-info-veiculo">
            <div class="container-detalhes-veiculo">
              <div class="content-detalhes-veiculo">
                <div class="div-title-descrição">
                  <h2 class="title-descrição-carro">Detalhes do veículo</h2>
                </div>
                <div class="lista-info-descrição-carro">
                  <li>
                    <p class="title-descrição">Ano</p>
                    <p class="descrição"><?php echo($dt_car['ano']) ?></p>
                  </li>
                  <li>
                    <p class="title-descrição">Km</p>
                    <p class="descrição"><?php echo($dt_car['quilometragem']) ?></p>
                  </li>
                  <li>
                    <p class="title-descrição">Câmbio</p>
                    <p class="descrição"><?php echo($dt_car['cambio']) ?></p>
                  </li>
                  <li>
                    <p class="title-descrição">Combustível</p>
                    <p class="descrição"><?php echo($dt_car['combustivel']) ?></p>
                  </li>
                  <li>
                    <p class="title-descrição">Portas</p>
                    <p class="descrição"><?php echo($dt_car['portas']) ?> portas</p>
                  </li>
                  <li>
                    <p class="title-descrição">Cor</p>
                    <p class="descrição"><?php echo($dt_car['cor']) ?></p>
                  </li>
                  <li>
                    <p class="title-descrição">Placa</p>
                    <p class="descrição">*** **Q</p>
                  </li>
                  <li>
                    <p class="title-descrição">Carroceria</p>
                    <p class="descrição"><?php echo($dt_car['carroceria']) ?></p>
                  </li>
                </div>
              </div>
            </div>
            <div class="container-detalhes-veiculo">
              <div class="content-detalhes-veiculo">
                <div class="div-title-descrição">
                  <h2 class="title-descrição-carro">Itens do veículo</h2>
                </div>
                <div class="lista-info-descrição-carro">
                <?php
                       
                      foreach($dt_adicional as $adicional){
                      echo("
                      <li>
                        <p class=\"descrição-detalhes\">{$adicional["nome"]}</p>
                      </li>
                      ");
                        
                      
                    };
                
                  ?>
                  
                </div>
              </div>
            </div>
            <div class="container-detalhes-veiculo">
              <div class="content-detalhes-veiculo">
                <div class="div-title-descrição">
                  <h2 class="title-descrição-carro">Sobre o veículo</h2>
                </div>
                <div class="sobre-veiculo">
                  <p>
                    Se você está sonhando em trocar de carro, agora você está na
                    direção certa! O seminovo mais novo do Brasil está na
                    Localiza Seminovos, onde você encontra a maior variedade de
                    modelos do mercado e muitas vantagens, como condições únicas
                    de financiamento, entrada facilitada em até 10 vezes sem
                    juros, carros revisados e com garantia de quilometragem
                    real, viabilizamos a troca do seu carro usado e entregamos
                    seu novo carro na segurança de sua casa! Agende já seu
                    atendimento! Outros Opcionais: <?php
                    $count = 1;
                    $max = $dt_adicional->num_rows;
                    foreach($dt_adicional as $adicional){
                      if($count == $max){
                        echo($adicional['nome']. ".");
                      }else{
                        echo($adicional['nome']. ", ");
                        $count = $count + 1;
                      }

                      
                    };
                    
                  ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <aside class="container-form-mensagem">
            <div class="content-form-mensagem">
              <div class="header-form">
                <!-- <i class="ri-question-answer-line"></i> -->
                <p class="title-descrição-carro">Contate o vendedor</p>
              </div>
              <form action="" class="form-mensagem" id="">
                <div class="container-input">
                  <span class="span-required">Informe seu nome</span>
                  <input
                    type="text"
                    class="input-form-mensagem nome requiredInput"
                    placeholder="Nome"
                  />
                </div>
                <div class="container-input">
                  <span class="span-required">Número Inválido</span>
                  <input
                    type="text"
                    class="input-form-mensagem telefone requiredInput"
                    placeholder="Telefone"
                    onkeyup="handlePhone(event)"
                    maxlength="15"
                  />
                </div>
                <div class="container-input">
                  <span class="span-required">Email Invalido</span>
                  <input
                    type="text"
                    class="input-form-mensagem email requiredInput"
                    placeholder="E-mail"
                  />
                </div>
                <textarea
                  name=""
                  id=""
                  cols="30"
                  rows="10"
                  class="input-form-mensagem input-text-area"
                  placeholder="Mensagem"
                >
Olá, vi seu veículo no seu site e tenho interesse. Aguardo seu contato!
              </textarea
                >
                <div>
                  <p class="text-small-form">
                    Ao clicar em "Enviar" você concorda com a nossa
                    <a class="text-underline">politica de privacidade.</a>
                  </p>
                </div>
                <input
                  type="submit"
                  class="input-submit-mensagem"
                  value="Enviar mensagem"
                />
              </form>
              <script src="../../assets/js/validacaoForm.js"></script>
            </div>
          </aside>
        </div>
      </div>
      <div class="container-veiculos-relacionados">
        <div class="content-veiculos-relacionados">
          <div class="title-veiculos-relacionados">
            <h2>Confira outras opções</h2>
          </div>
          <div class="veiculos-relacionados">
            <main class="grid-carros-destaque">
              <?php
                foreach($dt_similar as $similar){
                  $similar_ft = mysqli_fetch_array($conn->query("SELECT * FROM foto where id_carro = {$similar["id_carro"]};"));
                  $valor_similar = $similar['valor'];
                  $valor_similar = number_format($valor_similar, 2,',', '.');
                  echo("
                  
                      <!-- card carro -->
                      <a class=\"link-card card-carro\" href=\"./pages/veiculo/index.php?id={$similar["id_carro"]}\">
                        <img
                          src=\"../../assets/img/foto/{$similar_ft[1]}\"
                          alt=\"imagem {$similar['marca']}\"
                          class=\"img-carro\"
                          width=\"330px\"
                          height=\"210px\"
                        />
                        <div class=\"informações-carro\">
                          <h3 class=\"nome-carro\">{$similar['marca']} {$similar['modelo']}</h3>
                          <h3 class=\"valor-carro\">R$ {$valor_similar}</h3>
                          <div class=\"linha-card-carros\"></div>
                          <div class=\"caracteristica-carro\">
                            <div class=\"caracteristica-carro-1-col\">
                              <div class=\"descricao-caracteristica-carro\">
                                <img
                                  src=\"../../assets/img/Calendar.svg\"
                                  alt=\"\"
                                  width=\"18px\"
                                  height=\"18px\"
                                />
                                <p>{$similar['ano']}</p>
                              </div>
                              <div class=\"descricao-caracteristica-carro\">
                                <img
                                  src=\"../../assets/img/Speedometer.svg\"
                                  alt=\"\"
                                  width=\"18px\"
                                  height=\"18px\"
                                />
                                <p>{$similar['quilometragem']} km</p>
                              </div>
                            </div>
                            <div class=\"caracteristica-carro-2-col\">
                              <div class=\"descricao-caracteristica-carro\">
                                <img
                                  src=\"../../assets/img/Manual transmission.svg\"
                                  alt=\"\"
                                  width=\"18px\"
                                  height=\"18px\"
                                />
                                <p>{$similar['cambio']}</p>
                              </div>
                              <div class=\"descricao-caracteristica-carro\">
                                <img
                                  src=\"../../assets/img/Gasoline pump.svg\"
                                  alt=\"\"
                                  width=\"18px\"
                                  height=\"18px\"
                                />
                                <p>{$similar['combustivel']}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                      </a>
                      <!-- card carro -->
                  ");
                };
              ?>
              

            </main>
          </div>
        </div>
      </div>
      <footer class="container-footer">
        <div>
          <img src="" alt="LOGO REVENDA" />
        </div>
        <div>
          <p>© 1995-2023 NOME concessionaria Todos os direitos reservados.</p>
        </div>
      </footer>
    </main>
  </body>
</html>
