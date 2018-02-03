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


Route::get('/{lang}', 'CategoryController@index');

Route::get('/{lang}/gallery', 'InstagramController@index');

Route::get('/{lang}/category/{category}', 'CategoryController@index');
//Route::get('/{lang}/post/add', 'PostController@insert');
//Route::get('/{lang}/post/{slug}', 'PostController@index');

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@login');

Route::get('/{lang}/admin/view/{slug}', 'AdminController@update');
Route::post('/updatePostAction/{id}', 'AdminController@updatePostAction');
Route::get('/{lang}/admin/insert', 'AdminController@insert');
Route::post('/insertPostAction', 'AdminController@insertPostAction');

Route::get('{lang}/instagram', 'InstagramController@view');
Route::get('{lang}/instagram/{monthName}/{year}', 'InstagramController@viewByMonth');
Route::get('{lang}/instagram/insert', 'InstagramController@insert');
Route::get('{lang}/instagram/update/{id}', 'InstagramController@update');
Route::post('/updateInstagramAction/{id}', 'AdminController@updatePostAction');
Route::post('/insertInstagramAction', 'InstagramController@insertInstagramAction');
Route::post('/deleteInstagramAction/{id}', 'InstagramController@deleteInstagramDB');

Route::get('/{lang}/{slug}', 'PostController@index');

