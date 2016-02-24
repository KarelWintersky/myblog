@extends('main.app')

@section('title')
    {{$article->title}}
@endsection

@section('keywords')
    {{$article->meta_keywords}}
@endsection

@section('description')
    {{$article->meta_description}}
@endsection

@section('head')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection


@section('content')
    <article>
        </header>
            <h2>{{$article->title}}</h2>
        </header>
        <aside> 
            <p>tags
                @foreach($article->tags as $tag)
                    | <a href="/tag/{{$tag->name}}">{{$tag->name}}</a>
                @endforeach
            </p>
        </aside>
        
        <p>Дата публикации:
            <time pubdate datetime={{$article->updated_at->format('Y-m-d\TH:j:s')}}"2012-12-23T13:44:55">
                {{$article->created_at->format('Y.m.d H:j:s')}}
            </time>
        </p>
        
        {!!$article->content!!}
        
        @if(!empty($comments->first()))
            <section id="comments">
                <h3>Коментарии:</h3>
                <div>
                    <div class="comment">
                        <ul>
                            @foreach($comments as $comment)
                                <li>Автор: {{$comment->user}}<br>{{$comment->message}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif
       

        <aside id="ad_comment">
            <h3>Добавить коментарий:</h3>
            <div id="error">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            {{Form::open(['action' => 'CommentsController@save','role'=>"form"])}}
            {{Form::hidden('article_id',$article->id)}}
            <!--  -->
            <div class="comment-form-block">
                <label for="article_id">Имя:</label>
                <span class="required">*</span>
                <div class="form-text" id="user">{{Form::text('user')}}</div>
            </div>
            <div class="comment-form-block">
                <label for="article_id">Email:</label>
                <span class="required">*</span>
                <div class="form-text" id="email">{{Form::text('email')}}</div>
            </div>
            <div class="comment-form-block">
                <label for="article_id">Сообщение:</label>
                <span class="required">*</span>
                <div class="form-text" id="message">{{Form::text('message')}}</div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LfadRcTAAAAAEmsyAyhnjOdVa3oQDxPFW2mW2jp"></div>
            <div id="check_bot">
                {{Form::text('check_bot')}}
            </div>
            <div class="button">{{Form::submit('Отправить коментарий')}}</div>
        </aside>
    </article>
@endsection