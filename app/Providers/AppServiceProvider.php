<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Articles;
use APP\Data\Previews;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Как один из вариантов передать во все страницы меню
        
        //Подключаем навигацию по категориям во все представления
        //$categories = new Categories;
        //view()->share('categories', $categories->getAllCategory());

        //Подключаем основное меню во все представления
        //$menu = new Menu;
        //view()->share('menu', $menu->getMenu());

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
