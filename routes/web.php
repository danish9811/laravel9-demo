<?php

use App\Http\Controllers\TableUsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', static function () {
    return view('dashboard');
});

// Route::resource('/users', TableUsersController::class);

Route::get('/users', [TableUsersController::class, 'index']);
Route::get('/users/create', [TableUsersController::class, 'create']);
Route::post('/users', [TableUsersController::class, 'store']);
//Route::post('users', [TableUsersController::class, 'store']);
//Route::post('/users',[TableUsersController::class, 'store']);

//Route::post('/users', static function(\Illuminate\Http\Request $request) {
//     \App\Models\TableUsers::create($request->all());
//     redirect('/users');
//});

Route::get('test', function () {
    dd(csrf_token());
});

// lahore lat long
// 74.3587
// 31.5204
