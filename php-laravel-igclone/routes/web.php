<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/about', 'HomeController@about');

Route::post('follow/{user}', 'FollowsController@store');

Route::post('/like/{post}','LikeController@store');

Route::get('/','PostsController@index');

Route::get('/cctv','PostsController@cctv');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::post('/p/{post}', 'CommentController@store');
Route::get('/manage', 'PostsController@manage');
Route::get('/manage/delete/{post}', 'PostsController@delete');
Route::get('/account', 'UserController@show');
Route::patch('/account/edit', 'UserController@edit');
Route::get('/p/show/{post}', 'PostsController@edit')->name('posts.edit');
Route::patch('/p/edit/{post}', 'PostsController@update');
Route::get('/c/delete/{comment}', 'CommentController@delete');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
