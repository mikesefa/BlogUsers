@extends('admin.layout')

<link rel="stylesheet" href="/cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
@section('header')
<h1>Pagina Principal<small> Blog</small>
    {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"> Inicio</i></a></li>
        <li class="active">Bienvenidos!!</li>
    </ol> --}}
    @stop
    @section('content')
    <h3 class="text-center">Dashboard vista</h3>

    {{-- {{auth()->user()->name}} --}}

    <div>
        <div>
            <h1 class="display-1 text-dark text-center mb-4">Bienvenidos a <strong>MY</strong>BLOG</h1>
            <p class="lead text-black text-center mb-4">
                Crea tus blogs y compartelos !! <a class="btn btn-primary"
                    href="{{route('admin.post.create')}}">Comienza Ahora!</a></p>


        </div>
        <!--//row-->
    </div>
    <!--//container-fluid-->

    @stop
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- @extends('partials.editorscripts') --}}
