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
Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
	Route::get('/', 'BlogUplexisController@index')->name('/');

	Route::post('/search', 'BlogUplexisController@search')->name('search');

	Route::get('/articles', 'BlogUplexisController@listArticles')->name('articles');

	Route::get('/delete/{id}', 'BlogUplexisController@delete')->name('delete');
});

Auth::routes();

