<ul class="sidebar-menu">
    <li class="header">Navegación</li>

    <li {{request()->is('admin') ? 'class=active' : ''}}><a href="{{route('admin.dashboard')}}"><i
                class="fa fa-home"></i></i>
            <span>Inicio</span></a></li>
    @if(auth()->user()->hasRole('Admin'))
    <li class="{{request()->is('admin/users') ? 'active' : ''}} treeview">
        <a href="#">
            <i class="fa fa-user"></i><span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('admin.users.index')}}">
                    <i class="fa fa-user"></i><span>ver todos los Usuarios</span> <i
                        class="fa fa-angle-left pull-right"></i>
                </a></li>
            <li {{request()->is('admin/users/create') ? 'class=active' : ''}}><a
                    href="{{route('admin.users.create')}}"><i class="fa fa-pencil"></i>crear un Usuario</a></li>

        </ul>
    </li>
    @endif


    <li {{request()->is('admin/post') ? 'class=active' : ''}}><a href="{{route('admin.post.index')}}"><i
                class="fa fa-file-text"></i> <span>Blogs Publicados</span></a>

    </li>
    <li {{request()->is('admin/post/create') ? 'class=active' : ''}}><a href="{{route('admin.post.create')}}"><i
                class="fa fa-pencil"></i><span> Crear Blog</span> </a>
    </li>
</ul>

</html>
