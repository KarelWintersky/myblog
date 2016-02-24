<?php

namespace App\Http\Controllers;

use App\Model\Articles;
use App\Model\Categories;
use App\Model\Comments;
use App\Model\Tags;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends MainController
{
    public function getArticle($curl, Articles $article){
        //Получаем данные о статье
        $articleByCurl = $article->getArticleByCurl($curl)->first();
        //Добавляем тэги
        $articleByCurl->tags;
        //Добавляем название категорий
        $articleByCurl->category;
        //Добавляем опубликованные коментарии
        $articleByCurl->comments;
        
        $this->data['article'] = $articleByCurl;
        return view('article',$this->data);
    }
    //Выводим полученную группу статей в виде превью в контенте
    private function preViews($articles){
        foreach($articles as $article){
            $article->category;
            $article->tags;
            //Если нужены не все теги а с опред. фильтром, то можно так:
            //$article->getTags();
        }
        $this->data['articles'] = $articles;
        return view('articles',$this->data);
    }
    //Получить все статьи определенного тега
    public function getByTag($name,Tags $tags){
        $articlesByTag = $tags->getArticlesByTag($name);
        return $this->preViews($articlesByTag);
    }
    //Получить все статьи определенной категории
    public function getByCategory($name,Categories $categories){
        $articlesByCategory = $categories->getArticlesByCategory($name);
        return $this->preViews($articlesByCategory);
    }
    //Главная страница, выводим все опубликованные статьи
    public function index(Articles $article){
        $articlesAll = $article->getAllArticles();
        return $this->preViews($articlesAll);
    }
}
