<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  @yield('head')
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
<!-- Конец шапки сайта -->


<nav class="bottomMenu">
  <h2>Навигация:</h2>
  @include('main.nav')
</nav>

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