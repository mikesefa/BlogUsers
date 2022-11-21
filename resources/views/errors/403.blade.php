@extends('plantilla')

@section('contenido')
<div class="container">
    <article class="post no-image">
        <div class="content-post text-center">

            <h1>Error 404</h1>
            <hr>
            <p>Pagina no Autorizada</p>
            <a href="{{route('pages.home')}}" class="btn btn-success">Regresar</a>

        </div>
    </article>
</div>

@endsection
