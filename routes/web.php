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
    return view('guest.home.home');
});

Route::get('/collection', function () {
    return view('guest.collection.collection');
})->name('collection');

Route::get('/product', function () {
    return view('guest.product.product_detail');
})->name('product');

Route::get('/about', function () {
    return view('guest.about.about');
})->name('about');

Route::get('/contact', function () {
    return view('guest.contact.contact');
})->name('contact');