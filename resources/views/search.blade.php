@extends('main.app')

@section('title')
    <title>Поиск</title>
@endsection

@section('keywords')
    <meta name="keywords" content="Поиск">
@endsection

@section('description')
    <meta name="description" content="Результат поиска">
@endsection

@section('content')
   
    @if(!isset($articles))
        <h2>По запросу "{{$query}}" совсем ничего не найдено( Мне очень жаль...</h2>
    @else
        <h2>По запросу "{{$query}}" что-то найдено</h2>
        @foreach($articles as $article)
            <article>
                <header>
                <h3><a href="{{route('article',['curl'=>$article['curl'].'-'.$article['id']])}}">{{$article['curl']}}</a></h3>
                </header>
                <p>Дата публикации:
                    <time pubdate datetime="{{$article['updated_at']->format('Y-m-d\TH:j:s')}}">
                        {{$article['updated_at']->format('d.m.Y H:j:s')}}
                    </time>
                </p>
                {!!$article['preview']!!}
            </article>
        @endforeach
    @endif
    {{--пагинация--}}
    {{$articles->render()}}
@endsection