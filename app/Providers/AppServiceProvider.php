<?php

namespace App\Providers;

use App\Model\Categories;
use App\Model\Menu;
use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Menu $menu, Categories $categories)
    {




        //Подключаем навигацию по категориям во все представления
        view()->share('categories', $categories->getAllCategory());

        //Подключаем основное меню во все представления
        view()->share('menu', $menu->getMenu());
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
