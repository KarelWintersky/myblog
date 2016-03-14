<?php
//Для формирования шапки лого, слайдер и прочее

namespace App\Data;

use App\Data\Subsidiary\Data;
use App\Data\Subsidiary\InterfaceData;

use App\Model\Categories;
use App\Model\Menu;
use Illuminate\Support\Facades\Cache;

class Aside extends Data implements InterfaceData
{
    //store:[prevAll] Ключ:[страница]
    //store:[prevCat]    Ключ:[категория:страница]
    //store:[prevTag]    Ключ:[тег:страница]

    public function clearAllCash()
    {

    }

    public function clearCash($condition = [])
    {

    }

    public function getCategoryNavigate(){
        return Cache::store('aside')->rememberForever(
            'nav:cat',
            function(){
                $cat_cl = new Categories();
                $categories = $cat_cl->getAllCategory();
                foreach ($categories as $key => $category){
                    $date[$key]['id'] = $category->id;
                    $date[$key]['name'] = $category->name;
                    $date[$key]['curl'] = $category->curl;
                    //Получаем кол-во новостей в каждой категории
                    $date[$key]['count_article'] = $category->getArticlesByCondition()->count();
                }
                return $date;
            }
        );
    }

    public function getMainNavigate(){
        return Cache::store('aside')->rememberForever(
            'nav:main',
            function(){
                $menu = new Menu();
                foreach ($menu->getMenu() as $key => $menu_item){
                    $date[$key]['id']       = $menu_item->id;
                    $date[$key]['title']    = $menu_item->title;
                    $date[$key]['url']      = $menu_item->url;
                }
                return $date;
            }
        );
    }
}