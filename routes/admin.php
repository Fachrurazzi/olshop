<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('application.index');
})->name('admin.index');