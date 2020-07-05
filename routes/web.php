<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'Frontend\\HomeController@index')->name('homepage');
Route::get('/product/{product}', 'Frontend\\ProductController@show')->name('frontend.product.show');
Route::get('/product/category/{category}', 'Frontend\\ProductController@byCategory')->name('frontend.product.by.category');
Route::get('/cart/checkout', 'Frontend\\CheckoutController@index')->middleware('auth')->name('checkout.index');
Route::post('/cart/checkout', 'Frontend\\CheckoutController@store')->middleware('auth')->name('checkout.store');
Route::get('/cart/{product}', 'Frontend\\CartController@addItem')->middleware('auth')->name('cart.add.item');
Route::get('/cart', 'Frontend\\CartController@index')->middleware('auth')->name('cart.index');
Route::get('/order', 'Frontend\\OrderController@index')->middleware('auth')->name('frontend.order.index');
Route::get('/order/{order}', 'Frontend\\OrderController@show')->middleware('auth')->name('frontend.order.show');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', function() {
    return view('application.login');
});