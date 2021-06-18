@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />

@stop

@section('title')
Login & Cadastro | BShare
@stop

@section('navbar')
@stop

@section('content')

<!-- O código resposável pelo main está no -->
<section>
  <main>
    <div class="login-container">
      <!-- Login form -->
      <div class="login-c">
        <h2>Login</h2>
        <form id="form-login" class="login" method="POST" action="/login">
          @csrf

          <label for="nameOurEmail" id="label-verify"></label>
          <br />
          <input type="text" name="nameOurEmail" placeholder="Usuário ou E-mail" maxlength="50" required />
          <br />
          <input type="password" name="password" placeholder="Senha" maxlength="30" required />
          <br />
          <input value="Entrar" class="submit" type="submit" />
        </form>
      </div>

      <!-- Register user form -->
      <div class="cadastro-c">
        <h2>Cadastro</h2>
        <form action="/signUser" class="cadastro" method="POST" id="formRegisterUser">
          @csrf

          <input type="text" name="name" id="usuario" placeholder="Usuário" maxlength="50" required />
          <br />
          <input type="password" name="password" id="password" placeholder="Senha" minlength="8" maxlength="36" required />
          <br />
          <input type="password" id="confirmPassword" placeholder="Confirmar senha" minlength="8" maxlength="36" required />
          <br />
          <input type="text" name="email" id="email" placeholder="E-mail" maxlength="50" required />
          <br />
          <input onclick="validateRegister()" value="Cadastrar" class="submit" type="submit" />
        </form>
      </div>
    </div>
  </main>
</section>

@stop

@section('js')

<!-- JavaScript próprio-->
<script src="/js/menu.js"></script>
<script src="/js/login.js"></script>

@stop