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

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('movie/add', 'MovieController@add')->name('movie_add');
	Route::post('movie/add', 'MovieController@store')->name('movie_add_store');
	Route::get('movie/edit/{id}', 'MovieController@edit')->name('movie_edit');
	Route::post('movie/edit', 'MovieController@update')->name('movie_edit_update');
	Route::get('movie/remove/{id}', 'MovieController@remove')->name('movie_remove_store');
	Route::get('movie/manage', 'MovieController@manage')->name('movie_manage');
	Route::get('storage/{filename}', 'Controller@storage')->name('get_item');

	Route::get('screen/add', 'ScreenController@add')->name('screen_add');
	Route::post('screen/add', 'ScreenController@store')->name('screen_add_store');
	Route::get('screen/manage', 'ScreenController@manage')->name('screen_manage');
	Route::get('screen/delete/{id}', 'ScreenController@delete')->name('screen_delete');
});