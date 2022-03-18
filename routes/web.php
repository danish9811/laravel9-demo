<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableUsersController;

Route::get('/', static function () {
    return view('dashboard');
});


Route::resource('/books', BookController::class);

// todo : now rest of the work for register/login and if logged in, show him apexcharts, passport implement
