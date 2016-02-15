<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table="menus";
    protected $fillable = [
        'active',
        'weight',
        'title',
        'url',
        'position', //На будующее, если еще одно меню появится
    ];

    public function getMenu(){
        // Т.к. отсюда нам нужна всего одна функция,
        // возвращающая отсортированный список опубликованных ссылок меню, то обойдёмся без scope
        return $this->where(['active'=>1])->orderBy('weight')->get();
    }

}
