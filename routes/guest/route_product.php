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

//Route::get('/product-detail-json/quick-view/{slug?}_{id}','ProductDetailController@quickViewProduct')->name('product.quick_view');
//Route::get('/search','ProductDetailController@search')->name('search_product');
Route::get('/chi-tiet-san-pham/{slug?}_{id}','ProductDetailController@index')->name('product_detail');
Route::get('/san-pham/{slug}_{id}.js','ProductDetailController@quickViewProduct')->name('product.quick_view');
