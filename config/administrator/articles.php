<?php
return [
    'title'=>'Articles',
    'single'=>'article',
    'model' => 'App\Model\Articles',
    //список колонок
    'columns' => [
        'id',
        'title',
        'active',
        'comments_enable',
        'preview',
        'content',
        'meta_description',
        'meta_keywords',
        'categories_id' => [
            'title' => "Категория",
            'relationship' => 'category', //this is the name of the Eloquent relationship method!
            'select' => "(:table).title",
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
            'type' => 'relationship',
            'title' => 'Категории',
            'name_field' => 'title',
        ],
        'tags' => [
            'type' => 'relationship',
            'title' => 'Категории',
            'name_field' => 'name',
        ]
    ],
    'filters' => [
        'active' => [
            'type' => 'bool',
        ],
        'comments_enable' => [
            'type' => 'bool',
        ],
        'category' => [
            'type' => 'relationship',
            'title' => 'Категории',
            'name_field' => 'title',
        ],
        'tags' => [
            'type' => 'relationship',
            'title' => 'Категории',
            'name_field' => 'name',
        ]
    ],
    //Ширина области справа
    'form_width' => 430,
];