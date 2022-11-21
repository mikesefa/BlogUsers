@extends('admin.layout')

@section('header')

<h1>Mis Users <small> Listado de Usuarios</small></h1>
<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"> Inicio</i></a></li>
    <li class="active">Usuarios</li>
</ol>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Listado de Usuarios</h3>
        <a class="btn btn-primary pull-right" href="{{route('admin.users.create')}}"><i class="fa fa-plus"></i>
            Crear
            usuario</a>

    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="table1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getRoleNames()->implode(', ')}}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{route('admin.users.show',$user)}}"><i
                                class="fa fa-eye"></i></a>
                        <a class="btn btn-info btn-xs" onclick="return confirm('quieres editar este usuario?')"
                            href="{{route('admin.users.edit',$user)}}"><i class="fa fa-pencil"></i></a>
                        <form action="{{route('admin.users.destroy',$user)}}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-xs" onclick="return confirm('Eliminar este usuario?')"
                                type="submit"><i class="fa fa-times"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@endsection
