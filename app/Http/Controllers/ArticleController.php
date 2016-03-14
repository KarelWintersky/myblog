<?php

namespace App\Http\Controllers;

use App\Data\Previews;
use App\Model\Articles;
use App\Http\Requests;

class ArticleController extends MainController
{
    public function getArticle($curl){
        $id = $this->getIdFromCurl($curl);
        $article = new Article();
        $this->data['data'] = $article->getArticle($id);
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
