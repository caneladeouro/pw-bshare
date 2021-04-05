<!DOCTYPE html>
<html lang="pt-br">
<!--HEAD--------------------------------------------------------------------------------------------------->

<head>
  <!--browser navbar icone-->
  <link rel="shortcut icon" href="/img-icon/icon.png" type="image/x-icon" />

  <!--Metatags-->

  <!--Página info-->
  <meta charset="UTF-8" />
  <meta name="description" content=>
  <meta name="keywords" content=>

  <!--Autor info-->
  <meta name="author" content="Bruno Palermo dos Reis" />
  <meta name="author" content="Jose Elias Jesus da Silva" />
  <meta name="author" content="Matheus dos Santos Bonifácio" />
  <meta name="author" content="Eugenio Oliveira Mariano" />
  <meta name="email" content="brunoreispalermo@gmail.com" />
  <meta name="email" content="elliasilva17@gmail.com" />
  <meta name="email" content="caneladeouro10@gmail.com" />
  <meta name="institution" content="ETEC Drª Ruth Cardoso (Sala 1DS2)" />

  <!--Viewport responsivo-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--Stylesheets: 1-Bootstrap, 2-Própria-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
  <!--Título-->
  <title>Nome da Página | BShare</title>
</head>

<!--BODY--------------------------------------------------------------------------------------------------->

<body>
  <header>
    <!--Cabeçalho da página-->
    <!--Logo-->
    <div class="header-container logo-container">
      <img src="img/logo-white-full.png" class="logo" />
    </div>
  </header>

  <!-- O código resposável pelo main está no -->
  <main>
    <div class="login-container">
      <!-- Login form -->
      <div class="login-c">
        <h2>Login</h2>
        <form id="form-login" class="login" method="POST" action="/site/login">
          <label for="usuario-email" id="label-verify"></label>
          <br />
          <input type="text" name="usuario-email" placeholder="Usuário ou E-mail" maxlength="50" id="input-usuario-email" />
          <br />
          <label for="usuario-email" id="label-usuario-email"></label>
          <br />
          <input type="password" name="senha" placeholder="Senha" maxlength="30" id="password" />
          <br />
          <input onclick="submitInformation()" value="Entrar" class="submit" type="submit" />
        </form>
      </div>

      <!-- Register user form -->
      <div class="cadastro-c">
        <h2>Cadastro</h2>
        <form action="/site/login" class="cadastro" method="POST">
          <input type="text" name="usuario" id="usuario" placeholder="Usuário" maxlength="50" />
          <br />
          <input type="password" name="senha" id="senha" placeholder="Senha" maxlength="36" />
          <br />
          <input type="password" name="confirmar-senha" id="confirmar-senha" placeholder="Confirmar senha" maxlength="36" />
          <br />
          <input type="text" name="email" id="email" placeholder="E-mail" maxlength="50" />
          <br />
          <input type="submit" value="Cadastrar" class="submit" />
        </form>
      </div>
    </div>
  </main>

  <footer>
    <!--Rodapé da página-->
    BlenderShare | Copyright 2020
  </footer>

  <!--VLibras-->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget("https://vlibras.gov.br/app");
  </script>
  <!-- Bootstrap optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- JavaScript próprio-->
  <script src="/js/menu.js"></script>
  <script src="/js/login.js"></script>
</body>

</html>