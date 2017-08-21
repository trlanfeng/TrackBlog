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

Route::get('/posts'             ,'\App\Http\Controllers\ArticleController@index');
Route::get('/posts/{post}'      ,'\App\Http\Controllers\ArticleController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
