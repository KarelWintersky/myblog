<?php
return [
    'title'=>'Categories',
    'single'=>'category',
    'model' => 'App\Model\Categories',
    //список колонок
    'columns' => [
        'id',
        'name',
        'curl',
        'weight',
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
        'weight' => [
            'type' => 'number',
        ],
        'meta_description' => [
            'type' => 'text',
        ],
        'meta_keywords' => [
            'type' => 'text',
        ],
    ],

];