<?php
return [
    'title'=>'Categories',
    'single'=>'category',
    'model' => 'App\Model\Categories',
    //список колонок
    'columns' => [
        'id',
        'title',
        'weight'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'title' => [
            'type' => 'text',
        ],
        'weight' => [
            'type' => 'number',
        ]
    ],

];