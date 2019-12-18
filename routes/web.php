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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.home');
Route::get('/restos', 'HomeController@restaurants_index')->name('home.restos');
Route::get('/restos/{restaurant}', 'HomeController@restaurant_show')->name('home.restos.show');
Route::get('/menu/{restaurant}', 'HomeController@menu_input')->name('home.menu_input');
Route::post('/menu/', 'HomeController@create_menu')->name('home.create_menu');
Route::get('/menu/options', 'HomeController@show_options')->name('home.menu_options');


Route::group(['middleware' => ['auth', 'admin']], function(){
	Route::resources([
    	'restaurants' => 'RestaurantsController',
    	'categories' => 'CategoriesController',
    	'meals' => 'MealsController',
    	'drinks' => 'DrinksController'
	]);
	Route::get('meals/resto/{restaurant}', 'MealsController@resto_meal')->name('meals.resto');
	Route::get('meals/category/{category}', 'MealsController@category_meal')->name('meals.category');

});