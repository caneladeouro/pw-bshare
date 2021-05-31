@extends('layout')

@section('css')


<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')

Nome da Pasta | BShare

@stop

@section('content')

<main>
    <div class="pastaInfo">
        <div class="row">
            <h6>Criador da pasta</h6>
        </div>
        <div class="row">
            <h3 style="margin-right: 60px;">Nome da pasta</h3>
            <!--Somente deve aparecer caso o usuário esteja logado na conta que criou a pasta-->
            <div class="pastaEditar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                </svg>
                Editar
            </div>
        </div>
        <div class="row">
            Descrição da pasta
        </div>
    </div>
    <div class="pastaProjetos">
        @isset($data->created_projects)
        @foreach(array_slice($data->created_projects, 0, 4) as $created_project)
        <div class="col-sm-3">
            <a href="#">
                <div class="projeto-preview">
                    <p class="projeto-nome">
                        {{ $created_project->title }}
                    </p>
                    <a href="">
                        <p class="projeto-criador">
                            {{ $created_project->author->username }}
                        </p>
                    </a>
                    <p class="projeto-tipo">
                        {{ $created_project->category->category }}
                    </p>
                </div>
            </a>
        </div>
        @endforeach
        @endisset
    </div>
</main>

@stop

@section('js')

<script src="js/menu.js"></script>
<script src="js/preview-image.js"></script>

@stop