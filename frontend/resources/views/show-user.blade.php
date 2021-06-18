@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')
MYSELF | BShare
@stop

@section('logo')
@stop

@section('content')

<section>
    <div class="showUserCapa">
        <div class="row">
            <div class="col-sm-2">
                <div id="user-image" class="showUserImagem">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="row">
                            <h3 style="margin-left: 0; margin-right: 5px;">
                                {{ $data["username"] }}
                            </h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--textcolor)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2" style="margin-left: 20px;">
                                <circle cx="18" cy="5" r="3" />
                                <circle cx="6" cy="12" r="3" />
                                <circle cx="18" cy="19" r="3" />
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49" />
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49" />
                            </svg>
                            <!--esse ícone anterior pode ser clicado para compartilhar a página do usuário-->
                            <button class="showUserFollow" style="margin-left: 20px; margin-bottom: 20px;">+ follow</button>
                        </div>

                        <div class="">
                            {{ $data["description"] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="showUserConteudo">
        <div>
            <div class="d-flex mt-3">
                <h3 class="m-3">
                    Projects
                </h3>
                <a href="#" class="m-3">see more</a>
            </div>

            <div class="row row-col-4">
                @foreach(array_slice($data["created_projects"], 0, 4) as $created_project)
                <div class="col">
                    <a href="http://127.0.0.1:3000/projeto/{{ $created_project['id'] }}">
                        <div class="projeto-preview">
                            <p class="projeto-nome">
                                {{ $created_project["title"] }}
                            </p>
                            <a href="">
                                <p class="projeto-criador">
                                    {{ $created_project["author"]["username"] }}
                                </p>
                            </a>
                            <p class="projeto-tipo">
                                {{ $created_project["category"]["category"] }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <div class="d-flex mt-3">
                <h3 class="m-3">
                    Folders
                </h3>
                <a href="/pasta" class="m-3">see more</a>
            </div>


            @isset($data["folders"])
            @foreach($data["folders"] as $folder)
            <div class="col-sm-3">
                <a href="#">
                    <div class="projeto-preview">
                        <p class="projeto-nome">
                            {{ $folder["path"] }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
            @endisset
        </div>
    </div>
</section>

@stop