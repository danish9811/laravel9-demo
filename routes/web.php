<?php

use App\Http\Controllers\TableUsersController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', static function () {
    return view('dashboard');
});


Route::get('/users', [TableUsersController::class, 'index']);