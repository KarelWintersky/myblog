<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Slider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active'); //Будет ли выводится наш элемент меню или он будет отключёт
            $table->integer('weight'); //Порядок следования меню (вес)
            $table->string('image'); //название
            $table->string('position'); //Позиция слайдера
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
        Schema::drop('slider');
    }
}
