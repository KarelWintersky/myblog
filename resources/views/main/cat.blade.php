<aside>
    <h2>Категории</h2>
    <ul class="nav nav-pills nav-stacked">
      @foreach($categories as $category)
      <li {{Request::route()->getName()=='category' ? ($data['category']['id']==$category['id']?'class=active':'') :''}}>
          <a href="{{route('category',['curl'=>$category['curl'].'-'.$category['id']])}}">
              {!!$category['name']!!} ({{$category['count_article']}})
          </a>
      </li>
    @endforeach
</ul>
</aside>



