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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '/','middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/movie/add', 'MovieController@add')->name('movie_add');
	Route::post('/movie/add', 'MovieController@store')->name('movie_add_store');
	Route::get('/movie/manage', 'MovieController@manage')->name('movie_manage');
	Route::get('storage/{filename}', 'Controller@storage')->name('get_item');
});