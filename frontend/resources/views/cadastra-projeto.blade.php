<!DOCTYPE html>
<html lang="pt-br">

<!-- Bootstrap optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<!--HEAD--------------------------------------------------------------------------------------------------->

<head>
    <!--browser navbar icone-->
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />

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

    <!--Stylesheets: 1-Bootstrap, 2-Própria-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!--Título-->
    <title>Criar Projeto | BShare</title>
</head>

<!--BODY--------------------------------------------------------------------------------------------------->

<body>
    <header>
        <!--Cabeçalho da página-->
        <!--Logo-->
        <div class="header-container logo-container">
            <a href="/">
                <img src="img/logo-white-full.png" class="logo">
            </a>
        </div>
        <!--Menu Desktop-->
        <!--pesquisar-->
        <div class="dropdown menu-desktop menu-pesquisar">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search menu-icon">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>

            <div class="dropdown-content pesquisar">
                <form action="">
                    <input type="text" placeholder="Pesquisar">
                    <input type="submit" value=">" class="submit pesquisar-submit">
                </form>
            </div>
        </div>
        <!--conta-->
        <div class="dropdown menu-desktop menu-conta">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-user menu-icon">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>

            <div class="dropdown-content conta">
                <div class="acesso">
                    <a href="/logoff">Logoff</a> <br>
                    <a href="/signProject">+Postar Projeto</a><br>
                    <a href="">Configurações</a><br>
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
        </div>
    </header>

    <!-- O código resposável pelo main está no -->
    <main>
        <form action="/signProject" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="main row">
                <div class="col-sm-4">
                    <div class="editar-arquivo">
                        <span class="arquivo-style align-middle">
                            Importar Arquivo .blend
                        </span>
                        <input type="file" name="project" id="arquivo" required>
                        </di>
                    </div>
                    <div class="editar-preview">

                        <div class="editar-preview-principal">
                            <span class="arquivo-style align-middle">
                                Importar imagem de preview principal
                            </span>
                            <input type="file" name="mainImage" id="preview-principal" accept="image/x-png,image/jpeg">
                        </div>
                        <div class="row editar-previews-secundarias">
                            Importar vídeos e imagens de preview secundários
                            <div class="col-sm-4 editar-preview-template" onclick="previewClick()">
                                <div class="editar-preview-style preview-secundaria-1" onclick="previewClick()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </div>
                                <!--I/V secundária 1111111111111111111111111111111111111111111111111111111111111111111-->
                            </div>
                            <div class="col-sm-4 editar-preview-template preview-secundaria-2" onclick="previewClick()">
                                <div class="editar-preview-style" onclick="previewClick()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </div>
                                <!--I/V secundária 22222222222222222222222222222222222222222222222222222222222222222222-->
                            </div>
                            <div class="col-sm-4 editar-preview-template preview-secundaria-3" onclick="previewClick()">
                                <div class="editar-preview-style" onclick="previewClick()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </div>
                                <!--I/V secundária 3333333333333333333333333333333333333333333333333333333333333333333333-->
                            </div>
                        </div>
                    </div>
                    <!--COLUMN 1-->
                </div>
                <div class="col-sm-8 projeto-coluna2">
                    Título do Projeto: <br>
                    <input type="text" name="title" id="titulo" required>
                    <br><br>
                    Descrição do Projeto: <br>
                    <textarea name="description" id="descricao" rows="7" maxlength="200"></textarea>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            Categoria: <br>
                            <select name="category" id="categoria">
                                <option value="Modelos 3D">Modelo 3D</option>
                                <option value="Modelos de Personagem">Modelos de Personagem</option>
                                <option value="Modelos de Animal">Modelos de Animal</option>
                                <option value="Modelos de Objetos">Modelos de Objetos</option>
                                <option value="Cenas">Cenas</option>
                                <option value="Materiais/Shaders">Materiais/Shaders</option>
                                <option value="Add-ons">Add-ons</option>
                                <option value="Temas">Temas</option>
                                <option value="Texturas">Texturas</option>
                                <option value="HDRIs">HDRIs</option>
                            </select>
                            <br><br>
                            Versão do Blender: <br>
                            <select name="versao-blender" id="versao-blender">
                                <option value="2.9x">2.9x</option>
                                <option value="2.8x">2.8x</option>
                                <option value="2.7x">2.7x</option>
                                <option value="2.6x ou antes">2.6x ou antes</option>
                            </select>
                            <br><br>
                            Render Engine: <br>
                            <select name="render-engine" id="render-engine">
                                <option value="Cycles">Cycles</option>
                                <option value="Eevee">Eevee</option>
                                <option value="Workbench">Workbench</option>
                                <option value="Appleseed">Appleseed</option>
                                <option value="Mitsuba">Mitsuba</option>
                                <option value="LuxRender">LuxRender</option>
                                <option value="Yafaray">Yafaray</option>
                                <option value="Blender Engine">Blender Engine</option>
                            </select>
                        </div>
                        <!--COLUMN END-->
                        <div class="col-sm-6">
                            Tags (separe as tags com ","): <br>
                            <textarea name="tags" id="tags" rows="5"></textarea>
                            <br><br>
                            Preço<input type="text" name="price" id="a-venda" class="checkbox">
                            <input type="submit" value="Criar Projeto" class="submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <!--Rodapé da página-->
        BShare | Copyright 2021
    </footer>

    <div class="imagem-secundaria-popup hide">
        <button class="fechar-popup" onclick="popupClose()">
            X
        </button>
        <p>
            Deseja inserir uma imagem ou vídeo do youtube?
        </p>
        <input type="file" name="preview-secundaria" id="preview-secundaria" accept="image/x-png,image/jpeg">
        ou
        <button onclick="chooseVideo()">Vídeo</button>
    </div>
    <div class="video-popup hide">
        <button class="fechar-popup" onclick="popupClose()">
            X
        </button>
        <p>
            Insira um link do youtube:
        </p>
        <input type="text" name="preview-video" id="preview-video">
    </div>
    <section class="fundo-popup hide">
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

    <!-- JavaScript próprio-->
    <script src="js/menu.js"></script>
    <script src="js/preview-image.js"></script>
</body>

</html>