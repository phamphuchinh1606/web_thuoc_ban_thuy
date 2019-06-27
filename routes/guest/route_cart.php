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

Route::post('/cart/add','CartController@addCart')->name('cart.add');
Route::post('/cart/change','CartController@change')->name('cart.update');
Route::post('/cart/check-out/payment', 'CartController@showPayment')->name('cart.check_out.payment');
Route::post('/cart/check-out/finish','CartController@finishCreateCart')->name('cart.check_out.finish');
Route::get('/cart/check-out','CartController@checkOut')->name('cart.check_out');
Route::get('/cart/delete/{id}','CartController@destroy')->name('cart.delete');
Route::get('/cart/district','CartController@district')->name('cart.address.district');
Route::get('/cart','CartController@index')->name('cart');

