<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/', "HomeController@home");

Route::get('/about', 'HomeController@show');
Route::get('/articlesform', 'ArticleController@create');
Route::POST('/articles', 'ArticleController@store');
Route::get('/download', 'ArticleController@dpdf');
Route::get('/articles/{id}/edit', 'ArticleController@edit');
Route::PUT('/articles/{id}', 'ArticleController@update');
Route::get('/articles/{id}', 'ArticleController@show');
Route::get('/articles', 'ArticleController@index');
Route::get('/export', 'HomeController@export');

    

Auth::routes();
Route::get('/login/google', "Auth\LoginController@redirectToProvider");

Route::get('login/google/callback', "Auth\LoginController@handleProviderCallback");
Route::get('/home', 'HomeController@index')->name('home');
