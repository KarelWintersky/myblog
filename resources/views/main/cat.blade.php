<aside>
    <h2>Категории</h2>
    <ul class="nav nav-pills nav-stacked">
        @foreach($categories as $item)
          <!-- Еще 1н способ получения URL action('ArticleController@getByCategory',['name'=>$item->name])-->          
          <li {{$_SERVER['REQUEST_URI']=='/category/'.$item->name?'class=active':''}}>
              <a href="/category/{!!$item->name!!}">{!!$item->name!!} ({{$item->countArticle}})</a>
          </li>
        @endforeach
    </ul>
</aside>


   
