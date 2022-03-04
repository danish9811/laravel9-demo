<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', function() {
    return view('dashboard');
});
