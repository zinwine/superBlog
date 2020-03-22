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

Route::get('/hellollo', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');


/////////////// CATEGORY

Route::get('/category', 'CategoryController@index');
Route::post('/add-category', 'CategoryController@store');
Route::get('/edit-category/{id}', 'CategoryController@edit');
Route::post('/edit-category/{id}', 'CategoryController@update');
Route::get('/category/{id}', 'CategoryController@destroy');

/////////////////// POST

Route::get('/postss', 'PostController@allPosts');


Route::get('/post', 'PostController@index');
Route::post('/add-post', 'PostController@store');
Route::get('/edit-post/{id}', 'PostController@edit');
Route::post('/edit-post/{id}', 'PostController@update');
Route::get('/post/{id}', 'PostController@destroy');