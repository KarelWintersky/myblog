<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table="categories";
    protected $fillable = [
        'name',
        'weight'
    ];

    //Получить все отсортированные категории
    public function getAllCategory(){
        return $this->orderByWeight()->get();
    }
    //Получить все опубликованные, отсортированные статьи одной категории
    public function getArticlesByCategory($name){
        return $this->getCategory($name)->first()->articles()->published()->orderByParam()->get();
    }

    //Для админки
    public function articles(){
        return $this->hasMany('App\Model\Articles','categories_id','id');
    }

    //scope
    public function scopeGetCategory($query,$name){
        $query->where(['name'=>$name]);
    }
    public function scopeOrderByName($query){
        $query->orderBy('name');
    }
    public function scopeOrderByWeight($query){
        $query->orderBy('weight');
    }
}
