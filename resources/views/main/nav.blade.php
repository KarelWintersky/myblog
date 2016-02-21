<ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    @foreach($menu as $item)
        <li><a href="{!!$item->url!!}">{!!$item->title!!}</a></li>
    @endforeach
</ul>
