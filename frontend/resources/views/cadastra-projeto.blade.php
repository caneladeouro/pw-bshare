@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')
Criar Projeto | BShare
@stop

@section('content')

<!-- O código resposável pelo main está no -->
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

@stop

@section('js')

<!-- JavaScript próprio-->
<script src="js/menu.js"></script>
<script src="js/preview-image.js"></script>

@stop