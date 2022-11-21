@extends('admin.layout')

@section('header')

<h1>Mis Users <small> Creando Usuarios</small></h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"> Inicio</i></a></li>
    <li class="active">Usuarios</li>
</ol>
@stop

@section('content')
<div class="row">
    <form method="POST" action="{{route('admin.users.store')}}">
        @csrf
        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos Personales</h3>
                </div>

                <div class="box-body">
                    @if($errors->any())
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="form-group">
                        <label for="name">Nombre :</label>
                        <input name="name" value="{{old('name')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email :</label>
                        <input type="email" name="email"  class="form-control">
                    </div>
                    <span class="help-block">La contraseña sera generada y enviada via email.</span>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Roles</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            @foreach ($roles as $id => $name)
                            <div class="checkbox">
                                <label>
                                    <input name="roles[]" type="checkbox" value="{{$name}}"
                                        {{$user->roles->contains($id)?
                                    'checked': ''}}>
                                    {{$name}}<br>

                                </label>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-6">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        @foreach ($permissions as $id => $name)
                        <div class="checkbox">
                            <label>
                                <input name="permissions[]" type="checkbox" value="{{$id}}"
                                    {{$user->permissions->contains($id)? 'checked' : ''}}>
                                {{$name}}
                            </label>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Crear Usuario</button>
    </form>
</div>




@endsection
