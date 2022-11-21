@extends('admin.layout')
@section('header')
<h1>Post <small> Editar Post</small></h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"> Inicio</i></a></li>
    <li class="active"><a href="{{route('admin.post.index')}}"><i> Posts</i></a></li>
    <li class="active"><a href="{{route('admin.post.create')}}"><i> Crear</i></a></li>
</ol>
@stop
@section('content')
<div class="row">
    <form method="POST" action="{{route('admin.post.update',$post)}}">
        @csrf @method('PUT')
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                        <label for="">Titulo Publicacion</label>
                        <input type="text" name="title" placeholder="Ingresa aqui el titulo de la publicación"
                            value="{{old('title',$post->title)}}" class="form-control">
                        {!! $errors->first('title','<span class="help-block">:message</span>')!!}
                    </div>

                    <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
                        <label for="">Contenido de Publicación</label>
                        <textarea rows=10 type="text" name="body" id="editor" value="{{old('body',$post->body)}}"
                            placeholder="
                            Ingresa aqui el Contenido de la publicación"
                            class="form-control">{{old('body',$post->body)}}</textarea>
                        {!! $errors->first('body','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Fecha de Publicación</label>
                        <div class="input-group">
                            <input name="published_at" type="date"
                                value="{{old('published_at',$post->published_at->format('m/d/A')) }}" min="2022-01-01"
                                class="form-control pull-right" id="datepicker">
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
                        <label for="">Categorias</label>
                        <select name="category_id" class="form-control">
                            <option value="">Selecciona una categoria</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category',$post->category_id) == $category->id ?
                                'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id','<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group {{$errors->has('tags') ? 'has-error' : ''}}">
                        <label for="">Selecciona etiqueta</label>
                        <select class="form-control" name="tags">
                            @foreach ($tags as $tag)
                            <option {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' :
                                ''}}
                                value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group {{$errors->has('excerp') ? 'has-error' : ''}}">
                        <label for="">Extracto</label>
                        <textarea type="text" value="" name="excerp"
                            placeholder="Ingresa aqui el extracto de la publicación"
                            class="form-control">{{old('excerp',$post->excerp)}}</textarea>
                        {!! $errors->first('excerp','<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Guardar Publicación</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
{{-- @extends('partials.datablescript') --}}
@extends('partials.editorscripts')
