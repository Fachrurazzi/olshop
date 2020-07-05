<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('application.index');
})->name('admin.index');

Route::resource('/category', 'CategoryController');
Route::resource('/product', 'ProductController');

Route::get('/order', 'OrderController@index')->name('order.index');
Route::get('/order/{order}', 'OrderController@show')->name('order.show');