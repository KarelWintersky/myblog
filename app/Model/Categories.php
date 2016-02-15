<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table="categories";
    protected $fillable = [
        'title',
        'weight'
    ];

    //Получить все отсортированные категории
    public function getAllCategory(){
        return $this->orderByWeight()->get();
    }
    //Получить все опубликованные, отсортированные статьи одной категории
    public function getArticlesByCategory($id){
        return $this->getCategory($id)->first()->articles()->published()->orderByParam()->get();
    }

    //Для админки
    public function articles(){
        return $this->hasMany('App\Model\Articles','categories_id','id');
    }

    //scope
    public function scopeGetCategory($query,$id){
        $query->where(['id'=>$id]);
    }
    public function scopeOrderByTitle($query){
        $query->orderBy('title');
    }
    public function scopeOrderByWeight($query){
        $query->orderBy('weight');
    }
}
