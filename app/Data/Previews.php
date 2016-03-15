<?php
namespace App\Data;

use App\Data\Subsidiary\Data;
use App\Data\Subsidiary\InterfaceData;
use App\Model\Articles;
use App\Model\Categories;
use App\Model\Tags;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Previews extends Data implements InterfaceData{
    //store:[prevAll]    Ключ:[страница]
    //store:[prevCat]    Ключ:[категория:страница]
    //store:[prevTag]    Ключ:[тег:страница]

    public function clearAllCash(){

    }

    public function clearCash($condition = []){

    }

    //Возвращает превьюхи опред. тегов
    public function getAllByTag($id){
        return Cache::store('prevTag')->rememberForever(
            $id.':'.$this->page,
            function() use ($id){
                $tags = new Tags();
                $tag = $tags -> getById($id) -> first();

                //Да, да для статей алгоритм обсалютно такой-же
                //Но я действую так, если код дублируется больше 2храз (Но только в рамках одного класса/ф-и php файла)то:
                //создаем шаблон для повторяющихся действий, выносим всё в ф-и и т.п.

                //Для хлебных крошек
                $items['tag'] = [
                    'id'    => $tag->id,
                    'name'  => $tag->name,
                    'curl'  => $tag->curl
                ];
                //методанные
                $items['title'] = $tag->name;
                $items['keywords'] = 'блог, разработка, тег, '.$tag->name;
                if($tag->meta_keywords!=''){ //Доп ключевые слова
                    $items['keywords'] .= ','.$tag;
                }
                $items['description'] = 'Блог начинающего backend разработчика'
                    .'Все статьи отобранные по тегу '.$tag->name.'.'
                    . $tag->meta_descriptiom;
                //Превьюхи
                $articles = $tag
                    -> articles()
                    -> published()
                    -> orderByParam()
                    -> with('tags','category')
                    -> paginate($this->countPage);


                //Превьюхи в нужном формате
                $items['articles'] = $this->createArrPreviews($articles);

                return $this->createLengthAwarePaginator($articles,$items);
            }
        );
    }

    //Возвращает превьюхи опред. категории
    public function getAllByCat($id){
        return Cache::store('prevCat')->rememberForever(
            $id.':'.$this->page,
            function() use ($id){
                $categories = new Categories();
                $category = $categories -> getById($id) -> first();

                //Для хлебных крошек
                $items['category'] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'curl' => $category->curl
                ];
                //методанные
                $items['title'] = $category->name;
                $items['keywords'] = 'блог, разработка, категория, '.$category->name;
                if($category->meta_keywords!=''){ //Доп ключевые слова
                    $items['keywords'] .= ','.$category->meta_keywords;
                }
                $items['description'] = 'Блог начинающего backend разработчика'
                                       .'Все статьи категории '.$category->name.'.'
                                       . $category->meta_descriptiom;
                //Превьюхи
                $articles = $category
                    -> articles()
                    -> published()
                    -> orderByParam()
                    -> with('tags','category')
                    -> paginate($this->countPage);


                //Превьюхи в нужном формате
                $items['articles'] = $this->createArrPreviews($articles);

                return $this->createLengthAwarePaginator($articles,$items);
            }
        );
    }

    //Возвращает превьюхи всех категорий для главной
    public function getAll(){
        return Cache::store('prevAll')->rememberForever(
            $this->page,
            function(){
                //методанные
                $items['title']         = 'Главная';
                $items['keywords']      = 'блог, разработка, php, главная';
                $items['description']   = 'Главная страница блога начинающего backend разработчика. Заходите.';

                //превьюхи
                $articles = new Articles();
                $articles = $articles
                    ->published()
                    ->orderByParam()
                    ->with('tags','category')
                    ->paginate($this->countPage);

                //Превьюхи в нужном формате
                $items['articles'] = $this->createArrPreviews($articles);

                return $this->createLengthAwarePaginator($articles,$items);
            }
        );
    }

    //формируем LengthAwarePaginator (формат кэшируемых данных)
    private function createLengthAwarePaginator($articles, $items){
        return new LengthAwarePaginator(
            $items,
            $articles->total(),
            $articles->perPage(),
            $articles->currentPage(), [
            'lastPage'  => $articles->lastPage(),
            'path'      => Request::capture()->url()
        ]);
    }

    // формируем массив данных для кэширования превью,
    private function createArrPreviews($articles){
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
                    'curl'  =>  $tag->curl,
                ];
            }
            $arr_by_cash[] = $arr_tmp;
        }
        return $arr_by_cash;
    }
}