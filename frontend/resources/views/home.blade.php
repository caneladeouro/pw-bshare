@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')
HOME | BShare
@stop

@section('content')

<section>
    <!-- O código resposável pelo main está no -->
    <main class="main">
        <div class="favoritos">
            <h3>Favoritos da Comunidade</h3>
            <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#blogCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">
                            <!--cada um desses eh o preview de um projeto diferente-->
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--.row-->
                    </div>
                    <!--.item-->

                    <div class="carousel-item">
                        <div class="row">
                            <!--cada um desses eh o preview de um projeto diferente-->
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            Nome do Projeto
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                Criador do projeto
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            Tipo do Projeto
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--.row-->
                    </div>
                    <!--.item-->

                </div>
                <!--.carousel-inner-->
            </div>
        </div>
        <!--FAVORITOS-->
        <div class="novos">
            <h3>Projetos Novos</h3>
            <div class="row">
                <!--cada um desses eh o preview de um projeto diferente-->
                @foreach (array_slice($data, 0, 4) as $project)
                <div class="col-sm-3">
                    <a href="#">
                        <div class="projeto-preview">
                            <p class="projeto-nome">
                                {{ $project->title }}
                            </p>
                            <a href="">
                                <p class="projeto-criador">
                                    Criador do projeto
                                </p>
                            </a>
                            <p class="projeto-tipo">
                                {{ $project->category }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</section>

@stop

@section('js')

<!-- JavaScript próprio-->
<script src="js/menu.js"></script>

@stop