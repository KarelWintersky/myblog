<?php
return [
    'title'=>'Menu',
    'single'=>'item',
    'model' => 'App\Model\Menu',
    //список колонок
    'columns' => [
        'id',
        'active',
        'weight',
        'title',
        'position',
        'url'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],
        'weight' => [
            'type' => 'number',
        ],
        'title' => [
            'type' => 'text',
        ],
        'url' => [
            'type' => 'text',
        ],
        'position' => [
            'type' => 'enum',
            'options' => [
                1 => 'main',
                2 => 'navigation'
            ],
        ],
    ],
    'filters' => [
        'active' => [
            'type' => 'bool'
        ],
        'title' => [
            'type' => 'text'
        ],
        'position' => [
            'type' => 'enum',
            'options' => [
                1 => 'main',
                2 => 'navigation'
            ],
        ],
    ],
];