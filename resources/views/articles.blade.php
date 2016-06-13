@extends('main.app')

@section('title')
    <title>{{$data['title']}}</title>
@endsection

@section('keywords')
    <meta name="keywords" content="{{$data['keywords']}}">
@endsection

@section('description')
    <meta name="description" content="{{$data['description']}}">
@endsection

@section('bread')
    @switch(Request::route()->getName())
    @case('tag')
        {!! Breadcrumbs::render('tag', $data['tag']) !!}
        @break
    @case('category')
        {!! Breadcrumbs::render('category', $data['category']) !!}
        @break
    @default
    @endswitch
@endsection

@section('content')
    @foreach($data['articles'] as $article)
        <article>
            <header>
            <h2><a href="{{route('article',['curl'=>$article['curl'].'-'.$article['id']])}}">{{$article['title']}}</a></h2>
            </header>
            @if(!empty($article['tags']))
                <aside> 
                    <p>tags
                        @foreach($article['tags'] as $tag)
                            | <a href="{{route('tag',['curl'=>$tag['curl'].'-'.$tag['id']])}}">{{$tag['name']}}</a>
                        @endforeach
                    </p>
                </aside>
            @endif
            <p>Дата публикации:
                <time datetime="{{$article['updated_at']->format('Y-m-d\TH:j:s')}}">
                    {{$article['updated_at']->format('d.m.Y H:j:s')}}
                </time>
            </p>
            {!!$article['preview']!!}
            <p class="text-right">
                <a href="{{route('article',['curl'=>$article['curl'].'-'.$article['id']])}}">
                    далее...
                </a>
            </p>
        </article>
    @endforeach
    {{--пагинация--}}
    {{$data->render()}}
@endsection