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
        'name' => [
            'type' => 'text',
        ],
        'password' => [
            'type' => 'password',
        ]
    ],
    
    'rules' => [
        'email'     => 'required|email|unique:users,email',
        'name'      => 'required|unique:users,name',
        'password'  => 'required',
    ],
];