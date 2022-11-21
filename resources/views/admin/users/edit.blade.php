@extends('admin.layout')

@section('header')

<h1>Mis Users <small> Editando Usuarios</small></h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"> Inicio</i></a></li>
    <li class="active">Usuarios</li>
</ol>
@stop

@section('content')
<div class="row">
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
                <form method="POST" action="{{route('admin.users.update',$user)}}">
                    @csrf @method('PUT')

                    <div class="form-group">
                        <label for="name">Nombre :</label>
                        <input name="name" value="{{old('name',$user->name)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email :</label>
                        <input type="email" name="email" value="{{old('email',$user->email)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña :</label>
                        <input type="password" name="password" class="form-control" placeholder="**********">
                        <span class="help-block">Dejar en blanco si no quieres cambiar la contraseña.</span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Repite la Contraseña :</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="**********">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Actualizar Usuario</button>
                </form>
            </div>

        </div>

    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <form method="POST" action="{{route('admin.users.roles.update',$user)}}">
                @csrf @method('PUT')
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        @foreach ($roles as $id => $name)
                        <div class="checkbox">
                            <label>
                                <input name="roles[]" type="checkbox" value="{{$id}}" {{$user->roles->contains($id)?
                                'checked' : ''}}>
                                {{$name}}
                            </label>

                        </div>
                        @endforeach
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar</button>
                </div>
            </form>
        </div>
        <div class="box box-primary">
            <form method="POST" action="{{route('admin.users.permissions.update',$user)}}">
                @csrf @method('PUT')
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

                    <button class="btn btn-primary btn-block">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
