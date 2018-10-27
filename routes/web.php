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
	Route::get('storage/{filename}', 'Controller@storage')->name('get_item');
	
	Route::group(['prefix' => 'movie'], function() {
		Route::get('add', 'MovieController@add')->name('movie_add');
		Route::post('add', 'MovieController@store')->name('movie_add_store');
		Route::get('edit/{id}', 'MovieController@edit')->name('movie_edit');
		Route::post('edit', 'MovieController@update')->name('movie_edit_update');
		Route::get('remove/{id}', 'MovieController@remove')->name('movie_remove_store');
		Route::get('manage', 'MovieController@manage')->name('movie_manage');
	});

	Route::group(['prefix' => 'screen'], function() {
		Route::get('add', 'ScreenController@add')->name('screen_add');
		Route::post('add', 'ScreenController@store')->name('screen_add_store');
		Route::get('screen/edit/{id}', 'ScreenController@edit')->name('screen_edit');
		Route::post('screen/edit', 'ScreenController@update')->name('screen_edit_update');
		Route::get('manage', 'ScreenController@manage')->name('screen_manage');
		Route::get('delete/{id}', 'ScreenController@delete')->name('screen_delete');
	});

	Route::group(['prefix' => 'show'], function() {
		Route::get('add', 'ShowController@add')->name('show_add');
		Route::post('add', 'ShowController@store')->name('show_add_store');
		Route::get('edit/{id}', 'ShowController@edit')->name('show_edit');
		Route::post('edit', 'ShowController@update')->name('show_edit_update');
		Route::get('remove/{id}', 'ShowController@remove')->name('show_remove_store');
		Route::get('manage', 'ShowController@manage')->name('show_manage');
	});

});