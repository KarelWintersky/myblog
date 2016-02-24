<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  @yield('head')
  <link rel="stylesheet" href="{{asset('packages/bootstrap-3.3.6-dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('packages/bootstrap-3.3.6-dist/css/bootstrap-theme.css')}}">
  
  
  <script src="{{asset('packages/jQuery/jquery-2.2.1.min.js')}}"></script>
  <script src="{{asset('packages/bootstrap-3.3.6-dist/js/bootstrap.min.js')}}"></script>
  
  <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
  
  <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">
</head>
<body>
    
    <!-- Шапка сайта -->
    <header class="container">
      <!--figure>
        <p><img src="images/logo.jpg" alt="Логотип"/></p>
        <figcaption>блоголого</figcaption>
      </figure-->
      <h1>Название сайта</h1>
      <h2>Описание сайта</h2>
    </header>

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
                <main>
                    <!--Блок основного контента-->
                    @yield('content')
                    <!--конец блока-->
                </main>
            </div>    
        </div>
    </div>

    <footer class="navbar-default navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <span>Footer</span>
        </div>
   </footer>
</body>
</html>
