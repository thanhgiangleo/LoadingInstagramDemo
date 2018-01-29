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
    return view('index');
});

Route::get('/ins', 'InstagramController@index');

Route::get('/{lang}/category/{category}', 'CategoryController@index');
Route::get('/{lang}/post/{slug}', 'PostController@index');
Route::get('/{lang}/post/add', 'PostController@insert');

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@login');

Route::get('/{lang}/admin/view/{slug}', 'AdminController@update');
Route::post('/updatePostAction/{id}', 'AdminController@updatePostAction');
Route::get('/{lang}/admin/insert', 'AdminController@insert');
Route::post('/insertPostAction', 'AdminController@insertPostAction');

Route::get('{lang}/instagram/insert', 'InstagramController@insert');
Route::post('{lang}/instagram/insert', 'InstagramController@insert');
