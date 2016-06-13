@extends('main.app')

@section('title')
    <title>{{$article['title']}}</title>
@endsection

@section('keywords')
    <meta name="keywords" content="{{$article['keywords']}}">
@endsection

@section('description')
    <meta name="description" content="{{$article['description']}}">
@endsection

@section('head')
    <script src="https://www.google.com/recaptcha/api.js"></script>
	@if(Session::has('message'))  
		<script>
			//Работа с модальными окнами
			$( document ).ready(function() {
				$('#myModal').modal();			
				$('#myModal').modal("show");
			});			
		</script>
	@elseif ($errors->has())
		<script>
			//В форме ошибки, переходим сразу к правке комментариев
			$( document ).ready(function() {
				location.href = '#add-comments';	
			});	
		</script>
	@endif
@endsection

@section('bread')
    {!! Breadcrumbs::render('article', $article) !!}
@endsection

@section('content')
	@if(Session::has('message'))
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{Session::get('message')}}</h4>
					</div>
				</div>
			</div>
		</div>
	@endif		
    <article>
        <header>
            <h2>{{$article['title']}}</h2>
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
            <time datetime={{$article['updated_at']->format('Y-m-d\TH:j:s')}}>
                {{$article['updated_at']->format('d.m.Y H:j:s')}}
            </time>
        </p>
        
        {!!$article['content']!!}
        
        @if(!empty($article['comments']))
            <section id="comments">
                <h3>Коментарии:</h3>
                    @foreach($article['comments'] as $comment)
                        @if($comment['answer'] != 1)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" alt="" src="/images/comments/img_64_64.png">
                                </a>

                                    <div class="media-body">
                                        <h4 class="media-heading">{{$comment['user']}}</h4>
                                        {{$comment['message']}}                          
                                    </div>
                            </div>
                        @else
                            <!-- Ответ -->
                            <div class="media well">
                                <a class="pull-left" href="#">
                                    <img class="media-object" alt="" src="/images/comments/img_adm_64_64.png">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Хозяин блога</h4>
                                    {!!$comment['message']!!}                          
                                </div>
                            </div>
                        @endif
                    @endforeach
            </section>
        @endif
       
        @if($article['is_comments'])
        <aside>
            <h3 id="add-comments">
				Добавить коментарий
			</h3>
            
            {{Form::open([
                'id'        =>  'comment_form',
                'route'     =>  'comment_save',                
            ])}}            
            
            {{Form::hidden('article_id',$article['id'])}}
            
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
                    @if($errors->has('email'))
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
			{{ Form::close() }}
        </aside>
        @else
            <div class="alert alert-warning">
                <strong>Предупреждение!</strong> Комментирование отключено!
            </div>
        @endif
    </article>
@endsection