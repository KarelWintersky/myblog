<?php

namespace App\Http\Controllers;

use App\Data\Previews;
use App\Data\Article;
use App\Data\Comments;

class ArticleController extends MainController
{
    public function getArticle($curl){
        $id = $this->getIdFromCurl($curl);
        $article = new Article();
        $this->data['article'] = $article->getArticle($id);
        $this->data['article']['comments'] = [];
        //Включены ли комментарии
        if($this->data['article']['is_comments']){
            $comments = new Comments;
            $this->data['article']['comments'] = $comments->getCommentsByIdArticle($id);  
        }
        return view('article',$this->data);
    }

    //Получить все статьи определенного тега
    public function getByTag($curl){
        $id = $this->getIdFromCurl($curl);
        $prev = new Previews();
        $this->data['data'] = $prev->getAllByTag($id);
        return view('articles',$this->data);
    }
    //Получить все статьи определенной категории
    public function getByCategory($curl){
        $id = $this->getIdFromCurl($curl);
        $prev = new Previews();
        $this->data['data'] = $prev->getAllByCat($id);
        return view('articles',$this->data);
    }
    //Главная страница, выводим все превью опубликованных статей
    public function index(){
        $prev = new Previews();
        $this->data['data'] = $prev->getAll();
        return view('articles',$this->data);
    }
}
