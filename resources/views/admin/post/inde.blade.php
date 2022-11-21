@extends('admin.layout')

@section('header')

<h1>Mis POSTS <small> Listado</small></h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"> Inicio</i></a></li>
    <li class="active">Posts</li>
</ol>
@stop

@section('content')

{{-- Usario: {{auth()->user()->name}} --}}

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de Publicaciones</h3>
        <a class="btn btn-primary pull-right" href="{{route('admin.post.create')}}"><i class="fa fa-plus"></i>
            Crear
            Publicación</a>

    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="table1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->excerp}}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{route('post.show',$post)}}"><i
                                class="fa fa-eye"></i></a>
                        <a class="btn btn-info btn-xs" onclick="return confirm('quieres editar este post?')"
                            href="{{route('admin.post.edit',$post)}}"><i class="fa fa-pencil"></i></a>
                        <form action="{{route('admin.post.destroy',$post)}}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-xs" onclick="return confirm('Elimiar este post?')"
                                type="submit"><i class="fa fa-times"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@stop
