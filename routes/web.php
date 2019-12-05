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
    return view('template');
})->name('home');
Route::resource('product', 'ProductController');
Route::post('/product/update/{id}', 'ProductController@update')->name('productUpdate');
Route::resource('customer', 'CustomerController');
Route::post('/customer/update/{id}', 'CustomerController@update')->name('customerUpdate');
