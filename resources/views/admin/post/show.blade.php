@extends('plantilla')

@section('meta-title',$post->title)
@section('meta-decription',$post->excerpt)

@section('contenido')

<article class="post image-w-text container">
    <div class="content-post">
        <header class="container-flex space-between">
            <div class="date">
                <span class="c-gris">{{optional($post->published_at)->format('M d')}}</span>
            </div>
            <div class="post-category">
                <span class="category">{{$post->category->name}}</span>
            </div>
        </header>
        <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
            <figure class="block-left"><img src="#" alt=""></figure>
            <div>
                {!!$post->body!!}
            </div>
        </div>

        <footer class="container-flex space-between">
            <div class="buttons-social-media-share">
                <ul class="share-buttons">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{request()->fullUrl()}}&title={{$post->title}}"
                            title="Compartir en Facebook" target="_blank"><img alt="Compartir en Facebook"
                                src="/img/flat_web_icon_set/Facebook.png"></a>
                    </li>
                    <li><a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$post->title}}&via=zendero&hashtags=zendero"
                            target="_blank" title="Tweet"><img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png"></a>
                    </li>
                    <li><a href="https://plus.google.com/share?url={{request()->fullUrl()}}" target="_blank"
                            title="Compartir en Google+"><img alt="Share on Google+"
                                src="/img/flat_web_icon_set/Google+.png"></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url={{request()->fullUrl()}}&description={{$post->title}}"
                            target="_blank" title="Pinterest"><img alt="Pin it"
                                src="/img/flat_web_icon_set/Pinterest.png"></a></li>
                </ul>
            </div>
            <div class="tags container-flex">
                @foreach ($tags as $tag)
                <span class="tag c-gris">#{{$tag->name}}</span>
                @endforeach
            </div>
        </footer>
        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread">

            </div>
</article>
@endsection
