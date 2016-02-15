<?php

namespace App\Http\Controllers;

use App\Model\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $date;
    //Формируем шапку лого, слайдер и прочее
    public function __construct(Menu $menu)
    {
        //перенаправляет незареганых на Home
        //$this->middleware('auth');
    }

}
