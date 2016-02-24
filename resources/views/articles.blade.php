@extends('main.app')

@section('title')

@endsection


@section('keywords')
    
@endsection


@section('description')
    
@endsection


@section('content')
    @foreach($articles as $article)
        <article>
            <header>
            <h2><a href="/article/{{$article->curl}}">{{$article->title}}</a></h2>
            </header>
            <aside> 
                <p>tags
                    @foreach($article->tags as $tag)
                        | <a href="/tag/{{$tag->name}}">{{$tag->name}}</a>
                    @endforeach
                </p>
            </aside>
            <p>Дата публикации:
                <time pubdate datetime="{{$article->updated_at->format('Y-m-d\TH:j:s')}}">
                    {{$article->created_at->format('d.m.Y H:j:s')}}
                </time>
            </p>
            {!!$article->preview!!}
            <p class="text-right">
                <a href="/article/{{$article->curl}}">
                    далее...
                </a>
            </p>
        </article>
    @endforeach
@endsection