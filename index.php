<?php
include_once('./assets/conn.php');

$dt_carros =  $conn->query("SELECT * FROM carro");
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <title>Início</title>
  </head>
  <body>
    <main>
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
                <a class="nav-link" href="./pages/empresa/index.html"
                  >Empresa</a
                >
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
      </header>
      <section class="container-banner"></section>

      <section class="container-search-main">
        <div class="container-search">
          <h2 class="title-home">Encontre seu carro</h2>
          <div class="container-form-search">
            <form action="" class="form-search">
              <div class="content-search">
                <i class="ri-search-2-line icon-search"></i>
                <input
                  type="text"
                  class="input-search"
                  placeholder="Pesquise por marca ou modelo do carro "
                />
              </div>
              <input type="submit" value="Buscar" class="search-submit" />
            </form>
          </div>
        </div>
      </section>

      <section class="container-marcas">
        <div class="content-marcas">
          <div>
            <h2 class="title-home">Marcas em destaque</h2>
          </div>
          <div class="slider-marcas">
            <img
              src="./assets/img/Fiat_logo logo.svg"
              alt=""
              width="60px"
              height="60px"
            />
            <img
              src="./assets/img/ford logo.svg"
              alt=""
              width="60px"
              height="60px"
            />
            <img
              src="./assets/img/honda logo.svg"
              alt=""
              width="60px"
              height="60px"
            />
            <img
              src="./assets/img/hyundai logo.svg"
              alt=""
              width="60px"
              height="60px"
            />
            <img
              src="./assets/img/toyota logo.svg"
              alt=""
              width="60px"
              height="60px"
            />
            <img
              src="./assets/img/Vector.svg"
              alt=""
              width="60px"
              height="60px"
            />
            <img
              src="./assets/img/Volkswagen logo.svg"
              alt=""
              width="60px"
              height="60px"
            />
          </div>
        </div>
      </section>

      <section class="container-carros-destaque">
        <div class="content-carros-destaque">
          <div>
            <h2 class="title-home">Veículos em destaque</h2>
          </div>
          <main class="grid-carros-destaque">
            <!-- card carro -->
            
            <div class="card-carro">
              <img
                src="./assets/img/carro-1.png"
                alt="Tesla 2022"
                class="img-carro"
              />
              <div class="informações-carro">
                <h3 class="nome-carro">Tesla Model S Paid 2022</h3>
                <h3 class="valor-carro">R$ 59.900,00</h3>
                <div class="linha-card-carros"></div>
                <div class="caracteristica-carro">
                  <div class="caracteristica-carro-1-col">
                    <div class="descricao-caracteristica-carro">
                      <img
                        src="./assets/img/Calendar.svg"
                        alt=""
                        width="18px"
                        height="18px"
                      />
                      <p>2022/2023</p>
                    </div>
                    <div class="descricao-caracteristica-carro">
                      <img
                        src="./assets/img/Speedometer.svg"
                        alt=""
                        width="18px"
                        height="18px"
                      />
                      <p>140.000 km</p>
                    </div>
                  </div>
                  <div class="caracteristica-carro-2-col">
                    <div class="descricao-caracteristica-carro">
                      <img
                        src="./assets/img/Manual transmission.svg"
                        alt=""
                        width="18px"
                        height="18px"
                      />
                      <p>Automatico</p>
                    </div>
                    <div class="descricao-caracteristica-carro">
                      <img
                        src="./assets/img/Gasoline pump.svg"
                        alt=""
                        width="18px"
                        height="18px"
                      />
                      <p>Eletrico</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- fim de um card -->
            <?php
              foreach ($dt_carros as $row) {
                
                $ft =  mysqli_fetch_array($conn->query("SELECT * FROM foto where id_carro = {$row["id_carro"]} ORDER BY id_foto ASC"));
                $valor = $row["valor"];
                $valor = number_format($valor, 2,',', '.');
                echo("
                <a href=\"./pages/veiculo/index.html?id={$row["id_carro"]}\">
                    <div class=\"card-carro\">
                  <img
                    src=\"./assets/img/foto/$ft[1]\"
                    alt=\"{$row["modelo"]} {$row["ano"]}\"
                    class=\"img-carro\"
                  />
                  <div class=\"informações-carro\">
                    <h3 class=\"nome-carro\">{$row["marca"]} {$row["modelo"]} {$row["ano"]}</h3>
                    <h3 class=\"valor-carro\">R$ {$valor}</h3>
                    <div class=\"linha-card-carros\"></div>
                    <div class=\"caracteristica-carro\">
                      <div class=\"caracteristica-carro-1-col\">
                        <div class=\"descricao-caracteristica-carro\">
                          <img
                            src=\"./assets/img/Calendar.svg\"
                            alt=\"\"
                            width=\"18px\"
                            height=\"18px\"
                          />
                          <p>{$row["ano"]}</p>
                        </div>
                        <div class=\"descricao-caracteristica-carro\">
                          <img
                            src=\"./assets/img/Speedometer.svg\"
                            alt=\"\"
                            width=\"18px\"
                            height=\"18px\"
                          />
                          <p>{$row["quilometragem"]} km</p>
                        </div>
                      </div>
                      <div class=\"caracteristica-carro-2-col\">
                        <div class=\"descricao-caracteristica-carro\">
                          <img
                            src=\"./assets/img/Manual transmission.svg\"
                            alt=\"\"
                            width=\"18px\"
                            height=\"18px\"
                          />
                          <p>Automatico</p>
                        </div>
                        <div class=\"descricao-caracteristica-carro\">
                          <img
                            src=\"./assets/img/Gasoline pump.svg\"
                            alt=\"\"
                            width=\"18px\"
                            height=\"18px\"
                          />
                          <p>{$row["combustivel"]}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                ");

              }
            ?>
          </main>
          <div class="div-link-ver-todos">
            <a href="" class="link-ver-todos">
              <h3 href="" class="subtitle-home">Ver todos</h3>
              <i class="ri-arrow-right-s-line icon-arrow"></i>
            </a>
          </div>
        </div>
      </section>

      <section class="container-informações-empresa">
        <div class="content-informações-empresa">
          <div class="content-google-maps">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5360.492034182247!2d-48.81789346107135!3d-26.271427363196622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94deb04935990a5b%3A0x15a4df357ac54416!2sJoinville%20Games!5e0!3m2!1spt-BR!2sbr!4v1680874797024!5m2!1spt-BR!2sbr"
              width="100%"
              height="100%"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>

          <div class="div-informações-empresa">
            <h2 class="title-informações-empresa">Informações para contato</h2>
            <div class="descrição-informações-empresa">
              <i class="ri-map-pin-2-line"></i>
              <p>Avenida Iriru 234, Iririu</p>
            </div>
            <div class="descrição-informações-empresa">
              <i class="ri-whatsapp-line"></i>
              <p>47 9999 9999</p>
            </div>
            <div class="descrição-informações-empresa">
              <i class="ri-phone-line"></i>
              <p>47 988 232</p>
            </div>
            <div class="descrição-informações-empresa">
              <i class="ri-mail-line"></i>
              <p>concessionaria@gmail.com</p>
            </div>
          </div>
        </div>
      </section>

      <footer class="container-footer">
        <div>
          <img src="" alt="LOGO" />
        </div>
        <div>
          <p>© 1995-2023 Auto concessionaria Todos os direitos reservados.</p>
        </div>
      </footer>
      <script src="./assets/js/main.js"></script>
    </main>
  </body>
</html>