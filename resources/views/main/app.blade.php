<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('title')  
  <link rel="stylesheet" href="{{asset('packages/bootstrap-3.3.6-dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('packages/bootstrap-3.3.6-dist/css/bootstrap-theme.css')}}">
  <script src="{{asset('packages/jQuery/jquery-2.2.1.min.js')}}"></script>
  <script src="{{asset('packages/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
  @yield('head')
  <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
  <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  @yield('keywords')
  @yield('description')
</head>
<body>
    <div class="container">  
    </div>
    <!-- Шапка сайта -->
    <header class="header media well">
		<div class="container">    
			<div class="row">
			  <!--figure>
				<p><img src="images/logo.jpg" alt="Логотип"/></p>
				<figcaption>блоголого</figcaption>
			  </figure-->
			  <h1>Демонстрационный сайт / блог</h1>
			  <h2>Описание сайта</h2>
		  </div>
		</div>
    </header>
    
    <main>
        <!-- Хлебные крошки -->
        @yield('bread')
        <!--конец блока-->

        <!-- Блок навигации -->
        @include('main.nav')
        <!--конец блока-->

        <div class="container">    
            <div class="row">
                <div class="col-sm-3 col-md-4 ">
                    <!--Блок боковой колонки-->
                    @include('main.cat')
                    <!--конец блока-->          
                </div>
                <div class="col-sm-7 col-md-6">
					<!--Блок основного контента-->
					@yield('content')
					<!--конец блока-->
                </div>    
            </div>
        </div>
    </main>

    <footer class="navbar-default navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <span>Footer</span>
        </div>
   </footer>
</body>
</html>
