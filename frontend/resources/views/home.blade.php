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
                        <div class="row row-cols-4">
                            <!--cada um desses eh o preview de um projeto diferente-->
                            @foreach(array_slice($main_projects, 0, 4) as $main_project)
                            <div class="col">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            {{ $main_project->title }}
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                {{ $main_project->author->username }}
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            {{ $main_project->category->category }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!--.row-->
                    </div>
                    <!--.item-->

                    <div class="carousel-item">
                        <div class="row row-cols-4">
                            <!--cada um desses eh o preview de um projeto diferente-->
                            @foreach(array_slice($main_projects, 4, 8) as $main_project)
                            <div class="col">
                                <a href="">
                                    <div class="projeto-preview">
                                        <p class="projeto-nome">
                                            {{ $main_project->title }}
                                        </p>
                                        <a href="">
                                            <p class="projeto-criador">
                                                {{ $main_project->author->username }}
                                            </p>
                                        </a>
                                        <p class="projeto-tipo">
                                            {{ $main_project->category->category }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
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

                <div class="row row-cols-4">
                    @if($projects != null)
                    <!--cada um desses eh o preview de um projeto diferente-->
                    @foreach($projects as $project)
                    <div class="col">
                        <a href="/projeto">
                            <div class="projeto-preview">
                                <p class="projeto-nome">
                                    {{ $project->title }}
                                </p>
                                <a href="">
                                    <p class="projeto-criador">
                                        {{ $project->author->username }}
                                    </p>
                                </a>
                                <p class="projeto-tipo">
                                    {{ $project->category->category }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
    </main>
</section>

@stop

@section('js')

<!-- JavaScript próprio-->
<script src="js/menu.js"></script>

@stop