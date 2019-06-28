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

Route::get('/san-pham','CollectionController@index')->name('collection_all');
Route::get('/san-pham/thiet-bi','CollectionController@indexEquipment')->name('collection_equipment_all');
Route::get('/san-pham/thiet-tri','CollectionController@indexDesign')->name('collection_design_all');
Route::get('/san-pham/thiet-bi/{slug}','CollectionController@indexEquipment')->name('collection_equipment');
Route::get('/san-pham/thiet-tri/{slug}','CollectionController@indexDesign')->name('collection_design');
Route::get('/san-pham/{slug?}','CollectionController@index')->name('collection');
Route::get('/tim-kiem','CollectionController@search')->name('search');
Route::get('/tim-kiem/all/ajax','CollectionController@searchAjax')->name('search_ajax');
