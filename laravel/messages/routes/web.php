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


Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/messages/{message}', 'MessagesController@show');

Route::get('/users/{username}', 'UsersController@show');
Route::get('/users/{username}/follows', 'UsersController@follows');
Route::get('/users/{username}/followers', 'UsersController@followers');
Route::post('/users/{username}/follow', 'UsersController@follow');
Route::post('/users/{username}/unfollow', 'UsersController@unfollow');
//Route::get('/users/{username}', 'UsersController@show');


Route::post('/messages/create', 'MessagesController@create')->middleware('auth');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
