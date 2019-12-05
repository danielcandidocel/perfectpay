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
    return view('home');
})->name('home');
Route::resource('product', 'ProductController');
Route::post('/product/update/{id}', 'ProductController@update')->name('productUpdate');
Route::resource('customer', 'CustomerController');
Route::post('/customer/update/{id}', 'CustomerController@update')->name('customerUpdate');
Route::resource('sale', 'SaleController');
Route::post('/sale/update/{id}', 'SaleController@update')->name('saleUpdate');
Route::get('/report', 'ReportController@index')->name('report');