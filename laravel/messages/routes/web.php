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
Route::get('/messages','MessagesController@search');

Route::group(['middleware' => 'auth'], function(){
    Route::post('/users/{username}/follow', 'UsersController@follow');
    Route::post('/users/{username}/unfollow', 'UsersController@unfollow');
    Route::post('/users/{username}/dms', 'UsersController@sendPrivateMessage');

    Route::post('/messages/create', 'MessagesController@create');

    Route::get('/conversations/{conversation}', 'ConversationsController@showConversation');
});

Route::get('/users/{username}', 'UsersController@show');
Route::get('/users/{username}/follows', 'UsersController@follows');
Route::get('/users/{username}/followers', 'UsersController@followers');


//Route::get('/users/{username}', 'UsersController@show');

Auth::routes();
Route::get('/auth/facebook','SocialAuthController@facebook');
Route::get('/auth/facebook/callback','SocialAuthController@callback');
Route::post('/auth/facebook/register','SocialAuthController@register');


//Route::get('/home', 'HomeController@index')->name('home');
