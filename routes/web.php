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
	return view('landing.landing');
});

/*Auth */
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index');

	/*Category*/
	Route::resource('Category', 'CategoryController');
	Route::get('Datatable/Category', 'DatatableCategoryController@index');

	/*Book*/
	Route::resource('Book', 'BookController');
	Route::get('Datatable/Book', 'DatatableBookController@index');

	/*Circulation*/
	Route::resource('Circulation', 'CirculationController');
	Route::get('Datatable/Circulation', 'DatatableCirculationController@index');

});
