<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('curl');
            $table->boolean('active');            
            $table->string('title');
            $table->string('preview');
            $table->text('content');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->integer('categories_id');
            $table->boolean('comments_enable');
            $table->timestamps();
            $table->unique(['curl','active']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
