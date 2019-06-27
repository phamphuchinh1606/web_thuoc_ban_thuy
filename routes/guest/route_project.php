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

Route::get('/chi-tiet-du-an/{slug?}_{id}','ProjectController@index')->name('project_detail');
Route::get('/du-an','ProjectController@showAll')->name('projects');
