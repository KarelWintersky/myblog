<?php
return [
    'title'=>'Articles',
    'single'=>'article',
    'model' => 'App\Model\Articles',
    //список колонок
    'columns' => [
        'id',
        'curl',
        'title',
        'active',
        'comments_enable',
      //'preview',
      //'content',
        'meta_description',
        'meta_keywords',
        'categories_id' => [
            'title' => "Категория",
            'relationship' => 'category', //this is the name of the Eloquent relationship method!
            'select' => "(:table).name",
        ],
        'tags'  => [
            'title' => "Теги",
            'relationship' => 'tags',
            'select' => "GROUP_CONCAT((:table).name SEPARATOR ', ')",
        ]
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],        
        'comments_enable' => [
            'type' => 'bool',
        ],
        'curl' => [
            'type' => 'text',
        ],
        'title' => [
            'type' => 'text',
        ],
        'preview' => [
            'type' => 'text',
        ],
        'content' => [
            'title'=> 'content',
            'type' => 'wysiwyg',
        ],
        'meta_description' => [
            'type' => 'text',
        ],
        'meta_keywords' => [
            'type' => 'text',
        ],
        'category' => [
            'type'       => 'relationship',
            'title'      => 'Категории',
            'name_field' => 'name',
        ],
        'tags' => [
            'type'       => 'relationship',
            'title'      => 'Категории',
            'name_field' => 'name',
        ],
        
    ],
    'filters' => [
        'active' => [
            'type' => 'bool',
        ],
        'comments_enable' => [
            'type' => 'bool',
        ],
        'title' => [
            'type' => 'text',
        ],
        'category' => [
            'type'       => 'relationship',
            'title'      => 'Категории',
            'name_field' => 'name',
        ],
        'tags' => [
            'type'       => 'relationship',
            'title'      => 'Категории',
            'name_field' => 'name',
        ],
        
    ],
    
    'rules' => [
        'curl' => 'required',
        'title' => 'required',
    ],
    
    //Ширина области справа
    'form_width' => 430,
    
    'global_actions' => array(
        'download_excel' => array(
            'title'     => 'Очистить кэш',
            'messages'  => array(
                'active'    => 'Очистка кэша всех статей',
                'success'   => 'Подождите. Очищается кэш...',
                'error'     => 'ERROR',
            ),
            'action' => function($query)
            {
                $articles = new  App\Data\Article;
                $articles -> clear();
                $preview  = new App\Data\Previews;
                $preview -> clear();
                return true;
            }
        ),
    ),
];