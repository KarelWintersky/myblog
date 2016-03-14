<?php
return [
    'title'=>'Tags',
    'single'=>'tag',
    'model' => 'App\Model\Tags',
    //список колонок
    'columns' => [
        'id',
        'name',
        'curl',
        'meta_description',
        'meta_keywords'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        'curl' => [
            'type' => 'text',
        ],
        'meta_description' => [
            'type' => 'text',
        ],
        'meta_keywords' => [
            'type' => 'text',
        ],
        /*'articles' => [
            'type' => 'relationship',
            'title' => 'Категории',
            'name_field' => 'title',
        ]*/
    ],
];