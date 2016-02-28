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
                {{$article->created_at->format('d.m.Y H:j:s')}}
            </time>
        </p>
        
        {!!$article->content!!}
        
        @if($article->comments->first())
            <section id="comments">
                <h3>Коментарии:</h3>
                    @foreach($article->comments as $comment)
                        @if($comment->answer != 1)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="/images/img_64_64.png">
                                </a>

                                    <div class="media-body">
                                        <h4 class="media-heading">{{$comment->user}}</h4>
                                        {{$comment->message}}                          
                                    </div>
                            </div>
                        @else
                            <!-- Ответ -->
                            <div class="media well">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="/images/img_adm_64_64.png">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Хозяин блога</h4>
                                    {!!$comment->message!!}                          
                                </div>
                            </div>
                        @endif
                    @endforeach
            </section>
        @endif
       

        <aside>
            <h3>Добавить коментарий:</h3>
            
            {{Form::open([
                'id'        =>  'comment_form',
                'action'    =>  'CommentsController@save',
                'role'      =>  'form',
            ])}}            
            
            {{Form::hidden('article_id',$article->id)}}
            
            <div class="form-group {{$errors->has()?($errors->has('user')?'has-error':'has-success').' has-feedback':''}}">
                {!!Form::label( 'user', 
                                ($errors->has('user')?implode('<br />',$errors->get('user')):'Name'),
                                ['class'=>'control-label']
                )!!}               
                {{Form::text('user',null,[
                    'class'         => 'form-control',
                    'placeholder'   => 'Введите имя'
                ])}}
                @if($errors->has())
                    @if($errors->has('user'))
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    @else
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    @endif
                @endif
            </div>
            
            
            <div class="form-group {{$errors->has()?($errors->has('email')?'has-error':'has-success').' has-feedback':''}}">
                {!!Form::label( 'email', 
                                ($errors->has('email')?implode('<br />',$errors->get('email')):'Email'),
                                ['class'=>'control-label']
                )!!}
                {{Form::email('email',null,[
                    'id'            =>  'inputError',
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Введите email'
                ])}}
                @if($errors->has())
                    @if($errors->has('user'))
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    @else
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    @endif
                @endif
            </div>
            
            
            <div class="form-group {{$errors->has()?($errors->has('message')?'has-error':'has-success').' has-feedback':''}}">
                {!!Form::label( 'message', 
                                ($errors->has('message')?implode('<br />',$errors->get('message')):'Message'),
                                ['class'=>'control-label']
                )!!}
                {{Form::textarea('message',null,[
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Введите сообщение'
                ])}}
                @if($errors->has())
                    @if($errors->has('message'))
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    @else
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    @endif
                @endif
            </div>
            
            <!--div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfadRcTAAAAAEmsyAyhnjOdVa3oQDxPFW2mW2jp"></div>
            </div-->    
            
            <div style="display:none;">
                {{Form::text('check_bot')}}
            </div>
            
            <div class="form-group">
                {{Form::button('Отправить комментарий',[
                    'id'      => 'comment_form_button',
                    'class'   => 'btn btn-success',        
                    'onClick' => "document.getElementById('comment_form').submit();",
                ])}}
            </div>
        </aside>
    </article>
@endsection