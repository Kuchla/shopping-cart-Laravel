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

Route::get('/', ['uses' => 'ProductController@getProducts', 'as' => 'product.index']);
Route::get('/cart/add/{id}', ['uses' => 'CartController@getAddToCart', 'as' => 'cart.add']);
Route::get('/cart', ['uses' => 'CartController@getCart', 'as' => 'cart.index']);
Route::get('/cart/decrement/{id}', ['uses' => 'CartController@getDecrement', 'as' => 'cart.decrement']);
Route::get('/cart/increment/{id}', ['uses' => 'CartController@getIncrement', 'as' => 'cart.increment']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
