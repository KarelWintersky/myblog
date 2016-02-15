<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Главная страница
class IndexController extends MainController
{
    public function index()
    {
        return view('index');
    }

    private function navigate(){

    }
}
