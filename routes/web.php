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
Route::get('/courses', 'CourseTypeController@index')->name('course_type');
Route::get('/restaurants', 'RestaurantController@index')->name('restaurants');
Route::get('/process', 'Process@index')->name('process');

