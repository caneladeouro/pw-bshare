@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')
MYSELF | BShare
@stop

@section('logo')
@stop

@section('content')

<section>
    <div class="vw-100 bg-light d-flex p-3" style="margin-top: 115px;">
        <div id="user-image" class="rounded-circle m-1 vh-25">
            <img src="#" alt="user image">
        </div>

        <div class="mt-1 d-flex row vh-75">
            <div class="col-sm-10">
                <h4 class="text-dark fs-1">
                    {{ $data->username }}
                </h4>

                <div class="text-center text-dark">
                    {{ $data->biografy }}
                </div>
            </div>

            <div class="col-sm-2">
                <button class="btn btn-light text-dark mt-5" style="width: 100px">
                    <span style="width: 40px; height: 40px; background-image: url('/bootstrap-icons/file-plus-fill.svg');" class="badge bg-secondary"></span>
                    follow
                </button>
            </div>
        </div>
    </div>

    <div class="mb-73">
        <div>
            <div class="d-flex mt-3">
                <h3 class="m-3">
                    Projects
                </h3>
                <a href="#" class="m-3">see more</a>
            </div>

            <div>
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
        </div>

        <div>
            <div class="d-flex mt-3">
                <h3 class="m-3">
                    Folders
                </h3>
                <a href="#" class="m-3">see more</a>
            </div>

            @foreach($data->folders as $folder)
            <div class="col-sm-3">
                <a href="#">
                    <div class="projeto-preview">
                        <p class="projeto-nome">
                            {{ $folder->path }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@stop