<?php
return [
    'title'=>'Users',
    'single'=>'user',
    'model' => 'App\User',
    //список колонок
    'columns' => [
        'id',
        'email',
        'name'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'email' => [
            'type' => 'text',
        ],
    ],
];