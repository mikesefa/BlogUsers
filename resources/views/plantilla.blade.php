<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="@yield('meta-content','este es el Blog de Zendero')">
    <title>@yield('meta-title', config('app.name') ." | Blog")</title>
    @extends('partials.blogscss')
</head>

<body>
    <div class="preload"></div>
    <header class="space-inter">
        <div class="container container-flex space-between">
            <figure class="logo"><img src="/img/logo.png" alt=""></figure>
            <nav class="custom-wrapper" id="menu">
                <div class="pure-menu"></div>
                <ul class="container-flex list-unstyled">
                    <li><a href="{{route('pages.home')}}" class="text-uppercase">Inicio</a></li>
                    <li><a href="{{route('pages.about')}}" class="text-uppercase">Nosotros</a></li>
                    <li><a href="{{route('pages.archive')}}" class="text-uppercase">Archivos</a></li>
                    <li><a href="{{route('pages.contact')}}" class="text-uppercase">Contactos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('contenido')

    <footer class="container-flex space-between">
        <div class="tags container-flex">
            <span class="tag c-gray-1"></span>
            <span class="tag c-gray-1"></span>
        </div>
    </footer>
    </div>
    </article>

    </section>


    <div class="d-flex justify-content-end">

    </div>
    <section class="footer">
        <footer>
            <div class="container">
                <figure class="logo"><img src="/img/logo.png" alt=""></figure>
                <nav>
                    <ul class="container-flex space-center list-unstyled">
                        <li><a href="{{route('pages.home')}}" class="text-uppercase c-white actives">Inicio</a>
                        </li>
                        <li><a href="{{route('pages.about')}}" class="text-uppercase c-white">Nosotros</a></li>
                        <li><a href="{{route('pages.archive')}}" class="text-uppercase c-white">archivo</a></li>
                        <li><a href="{{route('pages.contact')}}" class="text-uppercase c-white">contacto</a></li>
                    </ul>
                </nav>
                <div class="divider-2"></div>
                <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut,
                    ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt
                    auctor.</p>
                <div class="divider-2" style="width: 80%;"></div>
                <p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La
                        Web</span></p>
                <ul class="social-media-footer list-unstyled">
                    <li><a href="#" class="fb"></a></li>
                    <li><a href="#" class="tw"></a></li>
                    <li><a href="#" class="in"></a></li>
                    <li><a href="#" class="pn"></a></li>
                </ul>
            </div>
        </footer>
    </section>
</body>

</html>
