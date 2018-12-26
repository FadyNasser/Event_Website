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


Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

//Route::get('/contact', 'PagesController@contact');

Route::get('/reviews', 'PagesController@reviews');

//Route::get('/apply', 'ApplicantsController@reviews');

Route::resource('posts','PostsController');

Route::resource('events','EventsController');

Route::resource('reviews','ReviewsController');

Route::resource('apply','ApplicantsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/contact', 'ContactController@show');
Route::post('/contact',  'ContactController@mailToAdmin');