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
    return view('welcome');
});

Route::resource('types', 'TypeController');
Route::resource('products', 'ProductController');
Route::resource('providers', 'ProviderController');
Route::resource('buys', 'BuyController');
Route::resource('drivers', 'DriverController');
Route::resource('sales', 'SaleController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
