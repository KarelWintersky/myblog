<?php
return [
    'title'=>'Картинки',
    'single'=>'картинку',
    'model' => 'App\Model\Images',
    //список колонок
    'columns' => [
        'article' => [
            'title' => "Название статьи",
            'relationship' => 'articles',
            'select' => "(:table).title",
        ],
        'article_id' => [
            'title' => "id статьи",
            'relationship' => 'articles',
            'select' => "(:table).id",
        ],
        'image'=>[
            'title'  => 'image',
            'output' => '(:value)<br /><img src="/images/articles/small/(:value)"/>',
        ],
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'articles' => [
            'type' => 'relationship',
            'title' => 'Статья',
            'name_field' => 'title',
        ],

        'image' => [
            'type' => 'image',
            'location' => public_path().'/images/articles/original/',
            'sizes' => [ //маленькое изображение
                //Последний параметр качество
                [65,65,'auto',public_path().'/images/articles/small/',100],
             ],
        ],
    ],
    
    'rules' => [
        'image' => 'required',
    ],
    
    'filters' => [
        'articles' => [
            'type' => 'relationship',
            'title' => 'Статья',
            'name_field' => 'title',
        ],
    ]
];