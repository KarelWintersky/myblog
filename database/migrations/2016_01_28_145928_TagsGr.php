<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagsGr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_gr', function (Blueprint $table) {
            $table->increments('id');
            //К какой статье относятся теги
            $table->integer('articles_id');
            $table->integer('tags_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags_gr');
    }
}
