<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active'); //Будет ли выводится наш элемент меню или он будет отключёт
            $table->integer('weight'); //Порядок следования меню (вес)
            $table->string('title'); //название
            $table->string('url'); //ссылка
            $table->string('position'); //Где расположено меню
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
