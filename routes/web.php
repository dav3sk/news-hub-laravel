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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/search', 'HomeController@search')->name('search');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/edit', 'UserController@edit')->name('user.edit');
    Route::put('/{user}', 'UserController@update')->name('user.update');

    Route::get('/favorites', 'FavoritesController@index')->name('favorite.index');
    Route::post('/favorites', 'FavoritesController@create')->name('favorite.create');
    // Route::delete('/{favorites}', 'FavoritesController@delete')->name('favorites.delete');
});
