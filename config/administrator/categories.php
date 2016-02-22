<?php
return [
    'title'=>'Categories',
    'single'=>'category',
    'model' => 'App\Model\Categories',
    //список колонок
    'columns' => [
        'id',
        'name',
        'weight'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        'weight' => [
            'type' => 'number',
        ]
    ],

];