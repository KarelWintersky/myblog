<?php
return [
    'title'=>'Tags',
    'single'=>'tag',
    'model' => 'App\Model\Tags',
    //список колонок
    'columns' => [
        'id',
        'name'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        /*'articles' => [
            'type' => 'relationship',
            'title' => 'Категории',
            'name_field' => 'title',
        ]*/
    ],
];