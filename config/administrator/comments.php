<?php
return [
    'title'=>'Comments',
    'single'=>'comment',
    'model' => 'App\Model\Comments',
    //список колонок
    'columns' => [
        'articles_id'=>[
            'title' => "ID статьи",
        ],
        'title'=>[
            'title' => "Название статьи",
            'relationship' => 'articles',
            'select' => "(:table).title",
        ],
        'active',
        'answer',
        'user',
        'email',
        'site',
        'message',
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'articles_id' => [
            'title'=>'Id_статьи',
            'type' => 'number',
        ],
        'active' => [
            'title'=>'Опубликован?',
            'type' => 'bool',
        ],
        'answer' => [
            'title'=>'Мой ответ',
            'type' => 'bool',
        ],
        'user' => [
            'type' => 'text',
        ],
        'site' => [
            'type' => 'text',
        ],
        'email' => [
            'type' => 'text',
        ],
        'message' => [
            'type' => 'wysiwyg',
        ],
    ],

    'filters' => [
        'articles_id'=>[
            'title' => "ID статьи",
        ],
        'articles' => [
            'type' => 'relationship',
            'title' => 'Статья',
            'name_field' => "title",
        ],
        'active' => [
            'title'=>'Опубликован?',
            'type' => 'bool',
        ],
        'answer' => [
            'title'=>'Мой ответ',
            'type' => 'bool',
        ],
        'user' => [
            'type' => 'text',
        ],
        'site' => [
            'type' => 'text',
        ],
        'email' => [
            'type' => 'text',
        ],
    ],

    'form_width' => 430,
];