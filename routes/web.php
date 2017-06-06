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

Route::get('/', 'IndexController@welcome');
Route::post('add_coment', 'HomeController@add_coment')->name('add_coment');

Route::get('/register', 'IndexController@register_get')->name('register_get');
Route::post('/register', 'IndexController@register_post')->name('register_post');

Route::get('login', 'IndexController@login_get')->name('login_get');
Route::post('login', 'IndexController@login_post')->name('login_post');

Route::get('logout', 'IndexController@logout_get')->name('logout_get');

Route::get('coment_delete/{coment_id}','HomeController@delete_coment');