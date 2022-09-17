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

Route::group(['middleware' => ['auth']], function(){
Route::get('/', 'PostController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create');
Route::get('/shows/{title}', 'PostController@show');
Route::resource('messages', 'MessageController', ['only' => ['store']]);
Route::get('/posts/{post}','PostController@detail');
Route::get('/posts/like/{id}', 'PostController@like')->name('post.like');
Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@delete');
Route::get('/posts/{post}/edit', 'PostController@edit');
});

Auth::routes();

Route::get('/mypage', 'HomeController@index')->name('mypage');

Route::get('/categories/{category}', 'CategoryController@index');

Route::get('/user', 'UserController@index');