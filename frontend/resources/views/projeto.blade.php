@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

@stop

@section('title')
Projeto | BShare
@stop

@section('content')

<!-- O código resposável pelo main está no -->
    <main>
        <div class="row">
            <div class="col-sm-8">
                <!--Preview de Projeto e Comentários-->
                <div class="row">
                    <h6>{{ $project->author->username }}</h6>
                </div>
                <div class="row nomeProjeto">

                <h4>{{ $project->title }}</h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>

                </div>
                <div class="projetoPreviews">
                <div class="row">
                    <div class="projetoPreview">

                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-4" style="padding-left: 0;">
                        <div class="projetoPreviewSecundaria projetoPreviewSecundaria1">

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="projetoPreviewSecundaria projetoPreviewSecundaria2">
                            
                        </div>
                    </div>
                    <div class="col-4" style="padding-right: 0;">
                        <div class="projetoPreviewSecundaria projetoPreviewSecundaria3">
                            
                        </div>
                    </div>
                </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    Data que Projeto foi Postado

                    <div class="projetoPastaEEditar">
                        <button class="projetoAdicionarAPasta" onclick="pasta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="9" y1="14" x2="15" y2="14"/></svg>
                            Adicionar a Pasta
                        </button>
                        <div class="projetoEditar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/></svg>
                            Editar 
                        </div>
                    <!--Só deve aparecer quando o projeto foi postado pela conta na qual o usuário está ligado-->
                    </div>
                </div>

                <!--Só deve aparecer quando o usuário está logado-->
                <div class="projetoComentarios">
                    <div class="projetoComentario projetoComentar" style="margin-bottom: 30px;">
                        <div class="projetoComentarioImgdePerfil">

                        </div>
                        <textarea name="comentar" id="comentar" rows="3" class="projetoComentarInput"></textarea>
                        <button class="projetoComentarBotao">Comentar</button>
                    </div>
                <!--Só deve aparecer quando o usuário está logado-->

                    Comentários:
                    <div class="projetoComentario projetoComentar" style="margin-top: 15px;">
                        <div class="projetoComentarioImgdePerfil">

                        </div>
                        <span class="ProjetoComentarioConteudo">
                            Comentário
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    </div>
                </div>
                
                <!--Preview de Projeto e Comentários-->
            </div>
            <div class="col-sm-4" style="margin-top: 64px;">
                <!--Informações do Projeto e Download-->
                <div class="row">
                    <div class="col-7">
                        <button class="projetoDownload"><h2 style="font-weight: 300;">Download</h2></button>
                    </div>
                    <div class="col-5">
                        N° de Downloads: XXX
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <div class="col-sm-4" style="padding: 0; text-align: center;">
                        Categoria
                    </div>
                    <div class="col-sm-4" style="padding: 0; text-align: center;">
                        Versão do Blender
                    </div>
                    <div class="col-sm-4" style="padding: 0; text-align: center;">
                        Render Engine
                    </div>
                </div>
                <div class="projetoTags">
                    <!-- Tag -->
                </div>
                <div class="projetoDescricao">
                    @isset($project->description)
                    {{ $project->description }}
                    @endisset
                </div>
                <!--Informações do Projeto e Download-->
            </div>
        </div>
    </main>

@stop

@section('js')
<!-- JavaScript próprio-->
    <script src="js/menu.js"></script>
    <script src="js/preview-image.js"></script>
@stop
