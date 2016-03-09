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
        return $this->getCategory($name)->first()->getArticlesByCondition();
    }
    //Получить определённую категорию
    public function getCategoryByName($name){
        return $this->getCategory($name)->first();
    }

    //Для админки (получить все статьи)
    public function articles(){
        return $this->hasMany('App\Model\Articles','categories_id','id');
    }
    //Получить все опубликованные, отсортированные статьи одной категории
    public function getArticlesByCondition(){
        return $this->articles()->published()->orderByParam();
    } 


    //scope
    public function scopeGetById($query,$id){
        $query->where(['id'=>$id]);
    }
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
