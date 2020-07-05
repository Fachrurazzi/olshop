<?php

use Illuminate\Support\Facades\Route;

Route::get('rajaongkir/province', 'RajaOngkirController@getProvince')->name('rajaongkir.province');
Route::post('rajaongkir/cost', 'RajaOngkirController@getCost')->name('rajaongkir.cost');
Route::get('rajaongkir/city', 'RajaOngkirController@getCity')->name('rajaongkir.city');
