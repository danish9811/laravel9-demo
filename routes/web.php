<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard');
Route::resource('/books', BookController::class);

Route::get('/login', [PassportAuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [PassportAuthController::class, 'showRegisterForm'])->name('register');

Route::post('/login-submit', [PassportAuthController::class, 'passportAuthLoginSubmit']);
Route::post('/register-submit', [PassportAuthController::class, 'passportAuthRegisterSubmit']);

Route::get('/chart', [PassportAuthController::class, 'showApexChart'])
    ->middleware('auth')
    ->name('apex-chart');
