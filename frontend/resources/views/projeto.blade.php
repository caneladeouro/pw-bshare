@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

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
                <h6>{{ $project["author"]["username"] }}</h6>
            </div>
            <div class="row nomeProjeto">

                <h4>{{ $project["title"] }}</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                    <line x1="12" y1="9" x2="12" y2="13" />
                    <line x1="12" y1="17" x2="12.01" y2="17" />
                </svg>

            </div>
            <div class="projetoPreviews">
                <div class="row">
                    <div class="projetoPreview" style="background-image: url('{{ $project[$main_image] }}'); object-fit: cover">

                    </div>
                </div>
                <div class="row row-col-3" style="margin-top: 15px">
                    @foreach($project['images'] as $image)
                    <div class="col" style="padding-left: 0;">
                        <div class="projetoPreviewSecundaria" style="background-image: url('{{ $image[$image_field] }}')">

                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row" style="margin-top: 15px;">

                    <div class="projetoPastaEEditar">
                        <div class="projetoAdicionarAPasta" onclick="projetoEscolherPasta()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                                <line x1="12" y1="11" x2="12" y2="17" />
                                <line x1="9" y1="14" x2="15" y2="14" />
                            </svg>
                            Adicionar a Pasta
                            <div class="projetoPastaOpcoes hide">
                                <ul>
                                    @foreach($project["folders"] as $folder)
                                    <li>
                                        {{ $folder }}
                                    </li>
                                    @endforeach
                                    <li onclick="addToFolder('{{ $project[$id] }}')">
                                        + Criar Nova Pasta
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="projetoEditar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                            </svg>
                            Editar
                        </div>
                        <!--Só deve aparecer quando o projeto foi postado pela conta na qual o usuário está ligado-->
                    </div>
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

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                </div>
            </div>

            <!--Preview de Projeto e Comentários-->
        </div>

        <div class="col-sm-4" style="margin-top: 64px;">
            <!--Informações do Projeto e Download-->
            <div class="row">
                <div class="col-7">
                    <button class="projetoDownload">
                        <h2 style="font-weight: 300;">Download</h2>
                    </button>
                </div>
            </div>
            <div class="row row-col-4" style="margin-top: 15px;">
                <div class="col" style="padding: 0; text-align: center;">
                    <p>
                        Categoria
                    </p>
                    <p>
                        {{ $project["category"]["category"] }}
                    </p>
                </div>
                <div class="col-sm-4" style="padding: 0; text-align: center;">
                    <p>
                        Versão do Blender
                    </p>
                    <p>
                        {{ $project["blender_version"] }}
                    </p>
                </div>
                <div class="col-sm-4" style="padding: 0; text-align: center;">
                    <p>
                        Render Engine
                    </p>
                    <p>
                        {{ $project["render_engine"] }}
                    </p>
                </div>
            </div>
            <div class="projetoTags">
                <!-- Tag -->
            </div>
            <div class="projetoDescricao">
                {{ $project["description"] }}
            </div>
            <!--Informações do Projeto e Download-->
        </div>
    </div>
</main>

@stop

@section('js')
<!-- JavaScript próprio-->
<script src="/js/folder.js"></script>
<script src="/js/menu.js"></script>
<script src="/js/preview-image.js"></script>
<script src="/js/adicionarpasta.js"></script>
@stop