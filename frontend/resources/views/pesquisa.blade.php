@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')
Pesquisa | BShare
@stop

@section('content')

<!-- O código resposável pelo main está no -->

<form action="" method="post">
    <input type="text" name="pesquisa" id="pesquisa" placeholder="Palavra-chave" class="pesquisaInput"> <br>
    <div class="row" style="margin-top: 15px;">
        <div class="col-lg-1">
            Filtrar por:
        </div>
        <div class="col-lg-11">
            <div class="row" style="padding: 0;">
                <!--Filtros-->
                <div class="col-lg-6" style="padding: 0;">
                    <div class="row" style="padding: 0;">
                        <div class="col-lg-3" style="padding: 0;">
                            <select name="categoria" id="categoria" placeholder="Categoria" class="pesquisaFiltro">
                                <option value="Categoria" disabled selected>Categoria</option>
                                <option value="Modelos">Modelos</option>
                                <option value="Materiais/Shaders">Materiais/Shaders</option>
                                <option value="Add-ons">Add-ons</option>
                                <option value="Temas">Temas</option>
                                <option value="Texturas">Texturas</option>
                                <option value="HDRIs">HDRIs</option>
                            </select>
                        </div>
                        <div class="col-lg-3" style="padding: 0;">
                            <select name="versaoDoBlender" id="versaoDoBlender" class="pesquisaFiltro">
                                <option value="Versão do Blender" disabled selected>Versão do Blender</option>
                                <option value="2.9x">2.9x</option>
                                <option value="2.8x">2.8x</option>
                                <option value="2.7x">2.7x</option>
                                <option value="2.6x ou antes">2.6x ou antes</option>
                            </select>
                        </div>
                        <div class="col-lg-3" style="padding: 0;">
                            <select name="renderEngine" id="renderEngine" class="pesquisaFiltro">
                                <option value="Render Engine" disabled selected>Render Engine</option>
                                <option value="Cycles">Cycles</option>
                                <option value="Eevee">Eevee</option>
                                <option value="Blender Engine">Blender Engine</option>
                                <option value="Workbench">Workbench</option>
                                <option value="Appleseed">Appleseed</option>
                                <option value="Mitsuba">Mitsuba</option>
                                <option value="LuxRender">LuxRender</option>
                                <option value="Yafaray">Yafaray</option>
                            </select>
                        </div>
                        <div class="col-lg-3" style="padding: 0; font-weight: 300;">
                            Preço:<input type="number" name="preço" id="preço" class="pesquisaFiltro" style="width: 50px;">
                        </div>
                        <!--Filtros-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="pesquisaResultados">
    <div class="row row-cols-4">
        @if($projects != null)
        <!--cada um desses eh o preview de um projeto diferente-->
        @foreach($projects as $project)
        <div class="col">
            <a href="#">
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

@stop

@section('js')

<!-- JavaScript próprio-->
<script src="js/menu.js"></script>
<script src="js/preview-image.js"></script>

@stop