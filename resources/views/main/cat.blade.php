<aside>
    <h2>Категории</h2>
    <ul class="nav nav-pills nav-stacked">
        @foreach($categories as $item)
      <li {{Route::current()->parameters()['name']==$item->name.'-'.$item->id ? 'class=active':''}}>
          <a href="{{route('category',['curl'=>$item->name.'-'.$item->id])}}">
              {!!$item->name!!} ({{$item->countArticle}})
          </a>
      </li>
    @endforeach
</ul>
</aside>



