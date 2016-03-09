@extends('main.app')
{{--*/
    $description = 'Блог начинающего backend разработчика.';
    if(!empty($articles[])){
        $title = $category->name;
        $keywords = 'категория,'.$category->name;
        $description .= 'Все статьи категории '.$category->name;
    }else if(!empty($tag)){
        $title = $tag->name;
        $keywords = 'тег,'.$tag->name;
        $description .= ' Все статьи помеченные тегом '.$tag->name;
    }else{
        $title = 'Главная';
        $keywords = 'главная';
        $description .= ' Главная. Все статьи';
    }
/*--}}
@section('title')
    <title>{{$title}}</title>
@endsection
@section('keywords')
    <meta name="keywords" content="блог,программирование,{{$keywords}}">
@endsection
@section('description')
    <meta name="description" content="{{$description}}">
@endsection

@section('bread')
    @if(!empty($category))
        {!! Breadcrumbs::render('category', $category) !!}
    @elseif(!empty($tag))
        {!! Breadcrumbs::render('tag', $tag) !!}
    @endif
@endsection

@section('content')
    {{dd($articles)}}
    @foreach($articles as $article)
        <article>
            <header>
            <h2><a href="{{route('article',['curl'=>$article['curl'].'-'.$article['id']])}}">{{$article['curl']}}</a></h2>
            </header>
            <aside> 
                <p>tags
                    @foreach($article['tags'] as $tag)
                        | <a href="{{route('tag',['curl'=>$tag['name'].'-'.$tag['id']])}}">{{$tag['name']}}</a>
                    @endforeach
                </p>
            </aside>
            <p>Дата публикации:
                <time pubdate datetime="{{$article['updated_at']->format('Y-m-d\TH:j:s')}}">
                    {{$article['updated_at']->format('d.m.Y H:j:s')}}
                </time>
            </p>
            {!!$article['preview']!!}
            <p class="text-right">
                <a href="/article/{{$article['curl']}}">
                    далее...
                </a>
            </p>
        </article>
    @endforeach
    {{--пагинация--}}
    {{$articles->render()}}
@endsection