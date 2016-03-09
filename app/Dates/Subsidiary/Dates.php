<?php
namespace App\Dates\Subsidiary;
use Illuminate\Http\Request;

class Dates{
    protected $cashOn;      //Кэшируем?
    protected $countPage;   //Кол-во статей на странице
    protected $page;        //Номер страницы

    public function __construct()
    {
        //Кэшируем?
        $this->cashOn = true;
        //Кол-во статей на странице
        $this->countPage = 2;
        //Номер страницы
        $this->page = Request::capture()->input('page');
    }

}