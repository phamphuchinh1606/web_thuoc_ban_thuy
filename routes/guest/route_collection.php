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

Route::get('/tat-ca-san-pham','CollectionController@index')->name('collection_all');
Route::get('/san-pham/{slug?}_{id?}','CollectionController@index')->name('collection');
Route::get('/tim-kiem','CollectionController@search')->name('search');
Route::get('/tim-kiem/all/ajax','CollectionController@searchAjax')->name('search_ajax');
