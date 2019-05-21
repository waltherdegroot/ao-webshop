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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/filter/{category_id}', 'ProductController@getItemsByCategory')->name('filter');

Route::get('/cart', 'ShoppingCartController@cart')->name('cart');
Route::get('/addToCart/{productId}', 'ShoppingCartController@addItem')->name('addToCart');
Route::get('/removeFromCart/{productId}', 'ShoppingCartController@removeItem')->name('removeFromCart');
Route::get('/order', 'ShoppingCartController@order')->name('order');

Route::resources([
    'categories' => 'CategoryController',
    'products' => 'ProductController'
]);