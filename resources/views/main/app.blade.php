<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  @yield('head')
  <link rel="stylesheet" href="{{asset('packages/bootstrap-3.3.6-dist/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('packages/bootstrap-3.3.6-dist/css/bootstrap-theme.css')}}">
  <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">
</head>
<body>

<!-- Шапка сайта -->
<header id="headerInner">
  <figure>
    <p><img src="images/logo.jpg" alt="Логотип"/></p>
    <figcaption>блоголого</figcaption>
  </figure>
  <h1>Название сайта</h1>
  <h2>Описание сайта</h2>
</header>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse">
      @include('main.nav')
    </div>
  </div>
</nav>
<!-- Конец шапки сайта -->




{{-- блок боковой колонки --}}
<aside id="colRight">
    <h2>Категории</h2>
    <ul>
      <ul>
        @foreach($category as $item)
          <li><a href="/category/{!!$item->id!!}">{!!$item->title!!}</a></li>
        @endforeach
      </ul>
    </ul>
</aside>


<main><!-- основной блок -->
    @yield('content')
</main>

<footer id="footerInner"><!-- Футер сайта -->
    <!-- ......... -->
</footer>
</body>
</html>