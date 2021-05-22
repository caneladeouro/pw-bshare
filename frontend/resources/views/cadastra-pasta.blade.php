@extends('layout')

@section('css')

<!--Stylesheets: 1-Bootstrap, 2-Própria-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

@stop

@section('title')
Criar pasta | BShare
@stop

@section('logo')
@stop

@section('content')

<section>
    <div class="cadastraPastaContainer">
        <form action="" method="post">
            <div class="row">
                Nome: <input type="text" name="pastaNome" id="pastaNome">
            </div>
            <div class="row" style="margin-top: 20px;">
                Descrição: <textarea name="pastaDescricao" id="pastaDescricao" cols="30" rows="3" style="margin-left: 10px;"></textarea>
            </div>
        </form>
        <button class="fechar-popup" onclick="popupClose()">
            X
        </button>
    </div>
    <div class="cadastraPastaBG">
        
    </div>
</section>

@stop