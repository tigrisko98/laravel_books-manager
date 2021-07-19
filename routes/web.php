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

Route::get('/', '\App\Http\Controllers\SiteController@index')->name('index');

Route::any('/book/create', '\App\Http\Controllers\BookController@createBook')->name('createBook');

Route::any('book/update/{id}', '\App\Http\Controllers\BookController@updateBook')->name('updateBook');

