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
    
    'rules' => [
        'name'   => 'required|unique:categories,name',
        'curl'   => 'required|unique:categories,curl',
        'weight' => 'required|integer',
    ],
    'global_actions' => array(
        //Create Excel Download
        'download_excel' => array(
            'title'     => 'Очистить кэш',
            'messages'  => array(
                'active'    => 'Очистка кэша',
                'success'   => 'Подождите. Очищается кэш...',
                'error'     => 'ERROR',
            ),
            //the Eloquent query builder is passed to the closure
            'action' => function($query)
            {
                $aside = new App\Data\Aside;
                $aside -> clear();
                return true;
            }
        ),
    ),
];