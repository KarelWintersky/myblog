<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    Route::get('article/{curl}', ['as'=>'article',  'uses'=>'ArticleController@getArticle']);
    Route::get('tag/{name}',     ['as'=>'tag',      'uses'=>'ArticleController@getByTag']);
    Route::get('category/{name}',['as'=>'category', 'uses'=>'ArticleController@getByCategory']);
    Route::get('index',          ['as'=>'home',     'uses'=>'ArticleController@index']);

    Route::post('comments','CommentsController@save');

    Route::auth();
    // Registration Routes...
    // Перекрываем регистрацию
    $this->get('register', 'Auth\AuthController@login');
    $this->post('register', 'Auth\AuthController@login');
});
