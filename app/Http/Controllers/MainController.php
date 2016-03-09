<?php

namespace App\Http\Controllers;

use App\Dates\Previews;
use App\Model\Menu;
use App\Model\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $data;

    //Формируем шапку лого, слайдер и прочее
    public function __construct()
    {   $cat_cl = new Categories;
        $categories = $cat_cl->getAllCategory();
        foreach ($categories as $category){
            //Получаем кол-во новостей в каждой категории
            //И добавляем в новый атрибут
            $category->countArticle = $category->getArticlesByCondition()->count();
        }   
        //Подключаем навигацию по категориям во все представления
        view()->share('categories', $categories);
        //Подключаем основное меню во все представления
        $menu = new Menu;
        view()->share('menu', $menu->getMenu());
    }

    // да, да, можно было расширить Request,
    // но с другой стороны эта ф-я нужна нам только для наследников данного контроллера
    protected function getIdFromCurl($curl){
        return substr(strrchr($curl, "-"), 1);
    }
}
