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

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('register', 'App\Http\Controllers\LoginController@register_form');
Route::post('register', 'App\Http\Controllers\LoginController@do_register');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('home', 'App\Http\Controllers\CollectionController@home');
Route::get('collections/list', 'App\Http\Controllers\CollectionController@list');
Route::get('collections/add/{name}', 'App\Http\Controllers\CollectionController@add');
Route::get('collections/view/{id}', 'App\Http\Controllers\CollectionController@view');
Route::get('collections/content/{id}', 'App\Http\Controllers\CollectionController@content');
Route::get('collections/remove-song/{song_id}', 'App\Http\Controllers\CollectionController@remove_song');
Route::get('collections/search/{search}', 'App\Http\Controllers\CollectionController@search');
Route::post('collections/add-song/{collection_id}', 'App\Http\Controllers\CollectionController@add_song');