@extends('main.app')

@section('title')

@endsection


@section('keywords')

@endsection


@section('description')

@endsection


@section('content')
    @foreach($articles as $article)
        <article style="border:solid 1px red";>
            </header>
            <h2>{{$article->title}}</h2>
            </header>
            <aside>
                <p>Теги:</p>
                <ul>
                    @foreach($article->tags as $tag)
                        <li><a href="/tag/{{$tag->id}}">{{$tag->name}}</a></li>
                    @endforeach
                </ul>
            </aside>
            <p>Дата публикации:
                <time pubdate datetime={{$article->updated_at->format('Y-m-d\TH:j:s')}}"2012-12-23T13:44:55">
                    {{$article->updated_at->format('Y.m.d H:j:s')}}
                </time>
            </p>
            <div id="content">
                {!!$article->preview!!}
            </div>
        </article>
    @endforeach
@endsection