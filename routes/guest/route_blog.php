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


Route::get('/tin-tuc','BlogController@index')->name('blog');
Route::get('/tin-tuc/chi-tiet/{slug?}_{id}','BlogController@detail')->name('blog.detail');
