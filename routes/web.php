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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login-admin','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login-admin','Auth\LoginController@login')->name('admin.login');
    Route::get('/logout-admin','Auth\LoginController@logout')->name('admin.logout');
});
//
//Route::get('/', function () {
//    return view('guest.home.home');
//});
//
//Route::get('/danh-sach-san-pham', function () {
//    return view('guest.collection.collection');
//})->name('collection');
//
//Route::get('/san-pham', function () {
//    return view('guest.product.product_detail');
//})->name('product');
//
//Route::get('/gioi-thieu', function () {
//    return view('guest.about.about');
//})->name('about');
//
//Route::get('/lien-he', function () {
//    return view('guest.contact.contact');
//})->name('contact');
//
//Route::get('/tin-tuc', function () {
//    return view('guest.blog.blogs');
//})->name('blogs');
//
//Route::get('/tin-tuc/chi-tiet', function () {
//    return view('guest.blog.blog_detail');
//})->name('blog_detail');
//
//Route::get('/gia-cong-co-khi', function () {
//    return view('guest.outsource.out_source');
//})->name('out_source');