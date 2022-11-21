@extends('admin.layout')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/adminlte/dist/img/user4-128x128.jpg"
                        alt="Foto de perfil">
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    <p class="text-muted text-center">{{$user->getRoleNames()->implode(', ')}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Usuario desde</b> <a class="pull-right">{{$user->created_at->format('d/M/Y')}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cant. Publicaciones</b> <a class="pull-right">{{$user->posts->count()}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Roles</b> <a class="pull-right">{{$user->getRoleNames()->implode(', ')}}</a>
                        </li>
                    </ul>

                    <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Publicaciones</h3>
                </div>
                <div class="box-body">
                    @forelse ($user->posts as $post)
                    <a href="{{route('post.show',$post)}}" target="_blank"><strong>{{$post->title}}</strong></a><br>
                    <small class="text-muted"><strong>Publicado :
                        </strong> {{$post->published_at->format('d/m/Y')}}</small>.<br>
                    <small class="text-muted">{{$post->excerp}}</small>
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No Tiene Publicaciones</small>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Roles</h3>
                </div>

                <div class="box-body">
                    @forelse ($user->roles as $role)
                    <strong>{{$role->name}}</strong></a><br>
                    @if ($role->permissions->count())
                    <br>
                    <small class="text-muted"><strong>Permisos:</strong> {{$role->permissions->pluck('name')->implode(',
                        ')}}</small><br>
                    @endif
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No Tiene Roles</small>
                    @endforelse
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Permisos adicionales</h3>
                </div>
                @if($user->hasPermissions)
                <div class="box-body">
                    @forelse ($user->permissions as $premission)
                    <strong>{{$permission->name}}</strong></a><br>
                    @if ($role->permissions->count())
                    <br>
                    @endif
                    @unless ($loop->last)
                    <hr>
                    @endunless
                    @empty
                    <small class="text-muted">No Tiene permisos adicionales</small>
                    @endforelse

                </div>
                @endif
            </div>
        </div>
    </div>


</section>
@endsection
