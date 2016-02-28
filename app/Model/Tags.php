<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table="tags";
    protected $fillable = [
        'name',
    ];


    //Получить все теги
    public function getAllTags(){
        return $this->all();
    }
    //Получаем все статьи определенного тега
    public function getArticlesByTag($name){
        return $this->getTag($name)->first()->getArticlesByCondition();
    }
    //Получаем определённый тег
    public function geTagByName($name){
        return $this->getTag($name)->first();
    }

    //Получить все статьи по всем тегам (для админки)
    public function articles()
    {
        return $this->belongsToMany('App\Model\Articles','tags_gr','tags_id','articles_id');
    }
    public function getArticlesByCondition(){
        return $this->articles()->published()->orderByParam();
    }

    //scope
    public function scopeGetTag($query,$name){
        $query->where(['name'=>$name]);
    }
}
