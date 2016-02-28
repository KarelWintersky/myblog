@extends('main.app')
{{--*/
    $description = 'Блог начинающего backend разработчика.';
    if(!empty($category)){
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
    <?php echo $articles->render(); ?>
@endsection