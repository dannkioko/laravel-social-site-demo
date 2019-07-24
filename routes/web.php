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

Route::get('/', 'PostController@index');

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
//submit edited form 
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
//load edit form
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
//create new post for(link)
Route::get('/post/create','PostController@create');
//store post content(form)
Route::post('/post','PostController@store');
//show post
Route::get('/post/{post}','PostController@show');
//create message
Route::get('/message/{user}/create','MessageController@create')->name('message.edit');
//store message in db
Route::post('/message/{user}', 'MessageController@store');
//show messages
Route::get('/messages/{user}', 'MessageController@index');
