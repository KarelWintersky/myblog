<?php
//Для формирования шапки лого, слайдер и прочее

namespace App\Data;

use App\Data\Subsidiary\InterfaceData;
use App\Model\Categories;
use Illuminate\Support\Facades\Cache;

class Aside implements InterfaceData
{
    protected $store = 'aside';
    
    public function clear()
    {
        Cache::store($this->store)->flush();
    }
    
    public function clearByType($type){
        Cache::store($this->store)->forget($type);
    }

    //Кэшируем меню с категориями
    public function getCategoryNavigate(){
        return Cache::store($this->store)->rememberForever(
            'menu:cat',
            function(){
                $cat_cl = new Categories();
                $categories = $cat_cl->getAllCategory();
                foreach ($categories as $key => $category){
                    $date[$key]['id']   = $category->id;
                    $date[$key]['name'] = $category->name;
                    $date[$key]['curl'] = $category->curl;
                    //Получаем кол-во новостей в каждой категории
                    $date[$key]['count_article'] = $category->getArticlesByCondition()->count();
                }
                return $date;
            }
        );
    }
}