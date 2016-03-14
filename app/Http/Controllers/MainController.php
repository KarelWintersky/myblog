<?php

namespace App\Http\Controllers;

use App\Data\Aside;
use App\Http\Requests;

class MainController extends Controller
{
    protected $data;

    //Формируем шапку лого, слайдер и прочее
    public function __construct()
    {   $cat_cl = new Aside();
        //Подключаем навигацию по категориям во все представления
        view()->share('categories', $cat_cl -> getCategoryNavigate());
        //Подключаем основное меню во все представления
        view()->share('menu', $cat_cl->getMainNavigate());
    }

    // да, да, можно было расширить Request,
    // но с другой стороны эта ф-я нужна нам только для наследников данного контроллера
    protected function getIdFromCurl($curl){
        return substr(strrchr($curl, "-"), 1);
    }
}
