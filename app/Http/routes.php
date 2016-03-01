<?php
Route::group(['middleware' => 'web'], function () {

    Route::get('article/{curl}', ['as'=>'article',  'uses'=>'ArticleController@getArticle']);
    Route::get('tag/{name}',     ['as'=>'tag',      'uses'=>'ArticleController@getByTag']);
    Route::get('category/{name}',['as'=>'category', 'uses'=>'ArticleController@getByCategory']);
    Route::get('/',              ['as'=>'home',     'uses'=>'ArticleController@index']);

    Route::post('comments','CommentsController@save');

    Route::auth();
    // Registration Routes...
    // Перекрываем регистрацию
    $this->get('register', 'Auth\AuthController@login');
    $this->post('register', 'Auth\AuthController@login');
});
