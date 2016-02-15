<?php
return [
    'title'=>'Slides',
    'single'=>'slide',
    'model' => 'App\Model\Slider',
    //список колонок
    'columns' => [
        'id',
        'active',
        'image'=>[
            'title' => 'image',
            'output' => '<img src="/uploads/slides/small/(:value)"/><br />'.'(:value)',
        ],
        'position'
    ],
    //Поля, доступные для редактирования
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],
        'weight' => [
            'type' => 'number'
        ],
        'image' => [
            'type' => 'image',
            'location' => public_path().'/uploads/slides/original/',
            'sizes' => [ //маленькое изображение
                //Последний параметр качество
                [100,100,'auto',public_path().'/uploads/slides/small/',100],
                [1000,800,'auto',public_path().'/uploads/slides/large/',100]
            ],
        ],
        'position' => [
            'type' => 'enum',
            'options' => [
                1 => 'main',
                2 => 'test'
            ],
        ]
    ],
];