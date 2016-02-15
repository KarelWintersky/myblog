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
    public function getArticle($id, Articles $article){
        //Получаем данные о статье
        $articleById = $article->getArticleById($id)->first();
        //Добавляем тэги
        $articleById->tags;
        //Добавляем название категорий
        $articleById->category;
        //
        $this->date['article'] = $articleById;

        //Получаем и записываем данныеые о коментариях
        $this->date['comments'] = $article->getCommentsById($id);
        return view('article',$this->date);
    }
    //Выводим полученную группу статей в виде превью в контенте
    private function preVeiws($articles){
        foreach($articles as $article){
            $article->category;
            $article->tags;
            //Если нужены не все теги а с опред. фильтром, то можно так:
            //$article->getTags();
        }
        $this->date['articles'] = $articles;
        return view('articles',$this->date);
    }
    //Получить все статьи определенного тега
    public function getByTag($id,Tags $tags){
        $articlesByTag = $tags->getArticlesByTag($id);
        return $this->preVeiws($articlesByTag);
    }
    //Получить все статьи определенной категории
    public function getByCategory($id,Categories $categories){
        $articlesByCategory = $categories->getArticlesByCategory($id);
        return $this->preVeiws($articlesByCategory);
    }
    //Главная страница, выводим все опубликованные статьи
    public function index(Articles $article){
        $articlesAll = $article->getAllArticles();
        return $this->preVeiws($articlesAll);
    }
}
