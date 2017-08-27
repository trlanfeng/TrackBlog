<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return 'hello world !';
});

Route::get('/categorys/','\App\Http\Controllers\CategoryController@index');
Route::get('/category/:title','\App\Http\Controllers\ArticleController@show');

Route::get('/articles/','\App\Http\Controllers\ArticleController@index');
Route::get('/article/:id','\App\Http\Controllers\ArticleController@show');

Route::get('/tags/','App\Http\Controller\TagController@index');
Route::get('/tag/:title','\App\Http\Controllers\ArticleController@show');

Route::group(['middleware'=>'auth','prefix'=>'admin'],function (){
    Route::get('/','\App\Http\Controllers\Admin\AdminController@index');

    Route::get('/categorys/','\App\Http\Controllers\Admin\CategoryController@index');
    Route::get('/category/{category?}','\App\Http\Controllers\Admin\CategoryController@show');
    Route::post('/category/','\App\Http\Controllers\Admin\CategoryController@edit');
    Route::put('/category/{category}','\App\Http\Controllers\Admin\CategoryController@edit');
    Route::delete('/category/{category}','\App\Http\Controllers\Admin\CategoryController@delete');

    Route::get('/articles/','\App\Http\Controllers\Admin\ArticleController@index');
    Route::get('/article/{article?}','\App\Http\Controllers\Admin\ArticleController@show');
    Route::post('/article/','\App\Http\Controllers\Admin\ArticleController@edit');
    Route::put('/article/{article}','\App\Http\Controllers\Admin\ArticleController@edit');
    Route::delete('/article/{article}','\App\Http\Controllers\Admin\ArticleController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
