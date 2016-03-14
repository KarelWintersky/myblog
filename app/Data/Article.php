<?php
//Для формирования шапки лого, слайдер и прочее

namespace App\Data;

use App\Data\Subsidiary\Data;
use App\Data\Subsidiary\InterfaceData;
use App\Model\Articles;
use Illuminate\Support\Facades\Cache;

class Article extends Data implements InterfaceData
{
    //store:[prevAll]    Ключ:[страница]
    //store:[prevCat]    Ключ:[категория:страница]
    //store:[prevTag]    Ключ:[тег:страница]

    public function clearAllCash()
    {

    }

    public function clearCash($condition = [])
    {

    }

    public function getArticle($id){
        return Cache::store('article')->rememberForever(
            $id,
            function() use ($id){
                $article_model = new Articles();
                $article = $article_model
                    -> published()
                    -> getById($id)
                    -> with('tags','category')
                    -> first();
                $data = [
                    'id'            =>  $article->id,
                    'title'         =>  $article->title,
                    'keywords'      =>  $article->meta_keywords,
                    'description'   =>  $article->meta_description,
                    'content'       =>  $article->content,
                    'created_at'    =>  $article->created_at,
                    'updated_at'    =>  $article->updated_at,
                    'category'      =>  [
                        'id'    => $article->category->id,
                        'name'  => $article->category->name,
                        'curl'  => $article->category->curl,
                    ]
                ];
                foreach($article->tags as $tag){
                    $data['tags'][] = [
                        'id'    =>  $tag->id,
                        'name'  =>  $tag->name,
                    ];
                }
                return $data;
            }
        );
    }
}