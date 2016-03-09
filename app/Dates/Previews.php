<?php
namespace App\Dates;

use App\Dates\Subsidiary\Dates;
use App\Dates\Subsidiary\InterfaceDates;
use App\Model\Articles;
use App\Model\Categories;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Previews extends Dates implements InterfaceDates{
    //store:[prevAllCat] Ключ:[страница]
    //store:[prevCat]    Ключ:[категория:страница]
    //store:[prevTag]    Ключ:[тег:страница]

    public function clearAllCash(){

    }

    public function clearCash($condition = []){

    }

    //Возвращает превьюхи опред. категории
    public function getAllByCat($id){
        return Cache::store('prevCat')->rememberForever(
            $id.':'.$this->page,
            function() use ($id){
                $category = new Categories();
                return $category -> getById($id)
                    -> first()
                    -> articles()
                    -> published()
                    -> orderByParam()
                    -> with('tags','category')
                    -> paginate($this->countPage);
            }
        );
    }

    //Возвращает превьюхи всех категорий для главной
    public function getAll(){
        return Cache::store('prevAllCat')->rememberForever(
            $this->page,
            function(){
                $articles = new Articles();
                return $articles->published()
                     ->orderByParam()
                     ->with('tags','category')
                     ->paginate($this->countPage);
            }
        );
    }

    //формируем LengthAwarePaginator (формат кэшируемых данных)
    private function createLengthAwarePaginator($articles, $option=[]){
        return new LengthAwarePaginator(
            $this->createArrPreviews($articles),
            $articles->total(),
            $articles->perPage(),
            $articles->currentPage(), [
            'lastPage'  => $articles->lastPage(),
            'path'      => Request::capture()->url()
        ]);
    }

    // формируем массив данных для кэширования превью,
    // чтобы не кэшировать лишнее, берем только используемые параметры
    private function createArrPreviews($articles){
        dd($articles);
        $arr_by_cash = [];
        foreach($articles->items() as $article){
            $arr_tmp = [
                'id'            =>  $article->id,
                'curl'          =>  $article->curl,
                'title'         =>  $article->title,
                'preview'       =>  $article->preview,
                'created_at'    =>  $article->created_at,
                'updated_at'    =>  $article->updated_at,
                'category'      =>  [
                    'id'    => $article->category->id,
                    'name'  => $article->category->name,
                ]
            ];
            foreach($article->tags as $tag){
                $arr_tmp['tags'][] = [
                    'id'    =>  $tag->id,
                    'name'  =>  $tag->name,
                ];
            }
            $arr_by_cash[] = $arr_tmp;
        }
        return $arr_by_cash;
    }
}