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

Route::get('book/delete/{id}', '\App\Http\Controllers\BookController@deleteBook')->name('deleteBook');

Route::get('/book/{id}', '\App\Http\Controllers\BookController@viewBook')->name('viewBook');

Route::get('/book/comments/{id}', '\App\Http\Controllers\BookController@viewComments')->name('viewComments');
Route::post('/book/comment/{id}', '\App\Http\Controllers\BookController@commentBook')->name('commentBook');
