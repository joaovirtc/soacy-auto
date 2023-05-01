<?php
// carregando dependencias
include_once('../../assets/conn.php');
session_start();

// codigo

if(isset($_SESSION["userID"])){
  header('location: http://localhost/sistemadecarro/admin/');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login em Painel de Controle</title>
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
    <main class="container">
      <div class="content">
        <h1 class="title">Painel De Controle</h1>
        <form action="../../assets/php/login.php" method="POST" class="form-login" id="formLogin">
          <div class="input-group">
            <label for="user">Usuário</label>
            <input
              type="text"
              placeholder="Usuário"
              class="requiredInput"
              oninput="nameValidate()"
              name="usuario"
            />
            <span class="span-required">Informe um nome de usuario</span>
          </div>
          <div class="input-group">
            <label for="senha">Senha</label>
            <input
              type="password"
              placeholder="Senha"
              class="requiredInput"
              oninput="passwordValidate()"
              name="senha"
            />
            <span class="span-required">Senha incorreta</span>
            <?php
              if(isset($_GET['err'])){
                echo("<p class=\"span-required on\">Dados de usuario invalido</p>");
              }
            ?>
          </div>
          <div class="input-group">
            <a onclick="showMensageForgetPassword()" class="link"
              >Esqueci minha senha</a
            >
            
            <div>
              <p id="mensagem">
                Por questões de segurança, enviamos um email para
                <span class="link mensagem">***@gmail.com</span><br />
                leia e siga todas instruções solicitadas.
              </p>
            </div>
          </div>
          <div class="input-group">
            <input type="submit" class="input-submit" />
          </div>
          <script src="../../assets/js/formValidate.js"></script>
        </form>
      </div>
      <script src="../../assets/js/app.js"></script>
    </main>
  </body>
</html>
