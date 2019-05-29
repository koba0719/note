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

// Routing => Post
Route::get('/', 'PostController@index')->name('home');
Route::get('posts/item/{id}', 'PostController@show');
Route::get('posts/search', 'PostController@search');

// Routing => UserController
//Route::get('/user/', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');

Route::middleware('verified')->group(function () {
    // Routing => PostController
    Route::get('posts/item/{id}/edit', 'PostController@edit');
    Route::get('posts/create', 'PostController@create');
    Route::post('posts/store', 'PostController@store');
    Route::put('posts/item/{id}', 'PostController@update');
    Route::delete('posts/item/{id}', 'PostController@destroy');

    // Routing => Post#Comment
    Route::post('posts/item/{id}/comment/store', 'PostController@commentStore');

    // Routing => UserController
    Route::get('/user/{id}/edit', 'UserController@edit');
    Route::put('/user/{id}', 'UserController@update');
    Route::delete('/user/{id}', 'UserController@destroy');
});
