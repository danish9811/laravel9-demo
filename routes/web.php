<?php

use App\Http\Controllers\TableUsersController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', static function () {
    return view('dashboard');
});

Route::resource('/users', TableUsersController::class);

// dummy code to overrite the datatable css with theme styles
Route::get('/change', static function () {
    return view('change', ['users' => \App\Models\TableUsers::all()]);
});
