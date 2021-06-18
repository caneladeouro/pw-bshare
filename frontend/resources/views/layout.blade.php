<!DOCTYPE html>
<html lang="pt-br">

<!-- Bootstrap optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<!--HEAD--------------------------------------------------------------------------------------------------->

<head>
    <!--browser navbar icone-->
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon" />

    <!--Metatags-->

    <!--Página info-->
    <meta charset="UTF-8">
    <meta name="description" content=>
    <meta name="keywords" content=>

    <!--Autor info-->
    <meta name="author" content="Bruno Palermo dos Reis">
    <meta name="author" content="Jose Elias Jesus da Silva">
    <meta name="author" content="Matheus dos Santos Bonifácio">
    <meta name="author" content="Eugenio Oliveira Mariano">
    <meta name="email" content="brunoreispalermo@gmail.com">
    <meta name="email" content="elliasilva17@gmail.com">
    <meta name="email" content="caneladeouro10@gmail.com">
    <meta name="institution" content="ETEC Drª Ruth Cardoso (Sala 1DS2)">

    <!--Viewport responsivo-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @yield('css')

    <!--Título-->
    <title>@yield('title')</title>
</head>

<!--BODY--------------------------------------------------------------------------------------------------->

<body>
    <!-- Header -->
    <section>
        <header>
            @section('logo')
            <!--Cabeçalho da página-->
            <!--Logo-->
            <div class="header-container logo-container">
                <a href="/">
                    <img src="/img/logo-white-full.png" class="logo">
                </a>
            </div>
            @show

            @section('navbar')
            <!--Menu Desktop-->
            <!--pesquisar-->
            <div class="dropdown menu-desktop menu-pesquisar">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search menu-icon">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>

                <div class="dropdown-content pesquisar">
                    <input type="text" id="search-bar-input" placeholder="Pesquisar">
                    <button onclick="searchBar()" class="submit pesquisar-submit">></button>
                </div>
            </div>
            <!--conta-->
            <div class="dropdown menu-desktop menu-conta">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user menu-icon">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>

                <div class="dropdown-content conta">
                    <div class="acesso">
                        @if (!session()->exists('user'))
                        <a href="/login">Login</a> ou <a href="/login">Cadastrar</a>
                        @else
                        <a href="/logoff">Logoff</a> <br>
                        <a href="/signProject">+Postar Projeto</a><br>
                        <a href="/myself">Perfil</a><br>
                        @endif
                    </div>
                    Tema
                    <button class="tema-btn tema-light">
                    </button>
                    <button class="tema-btn tema-dark">
                    </button>
                    <button class="tema-btn tema-contrast">
                    </button>
                    <br>
                    <br>
                    <a href="">Contato</a><br>
                    <a href="">Termos de Serviço</a><br>
                    <a href="">Políticas de Privacidade</a>

                </div>
            </div>
            <!--Menu Mobile-->
            <div class="menu-mobile hide" onclick="menuClick()">
                <hr class="sandwich hr1">
                <hr class="sandwich hr2">
                <hr class="sandwich hr3">
            </div>
            <div class="menu-container hide">
                <form action="">
                    <input type="text" placeholder="Pesquisar">
                    <input type="submit" value=">" class="submit pesquisar-submit">

                    <div class="acesso">
                        <a href="/site/login">Login</a> ou <a href="/site/login">Cadastrar</a>
                    </div>
                    <a href="">+Postar Projeto</a><br>
                    <a href="">Configurações</a><br>
                    Tema
                    <button class="tema-btn tema-light">
                    </button>
                    <button class="tema-btn tema-dark">
                    </button>
                    <button class="tema-btn tema-contrast">
                    </button>
                    <br>
                    <br>
                    <a href="">Contato</a><br>
                    <a href="">Termos de Serviço</a><br>
                    <a href="">Políticas de Privacidade</a>

                </form>
            </div>
            @show
        </header>
    </section>

    <main class="main">
        @yield('content')
    </main>

    <!--Rodapé da página-->
    <section>
        <footer>
            BShare | Copyright 2021
        </footer>
    </section>

    <!--VLibras-->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <script src="/js/search-bar.js"></script>

    @yield('js')
</body>

</html>