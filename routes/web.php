<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableUsersController;

Route::get('/', static function () {
    return view('dashboard');
});

// Route::resource('/users', TableUsersController::class);

Route::resource('/books', BookController::class);

//
//Route::get('/books', [BookController::class, 'index']);
//Route::get('/books/create', [BookController::class, 'create']);
//Route::post('/books', [BookController::class, 'store']);
//Route::get('/books/{book}', [BookController::class, 'edit']);
//Route::put('/books', [BookController::class, 'update']);
//

//Route::get('/users', [TableUsersController::class, 'index']);
//Route::get('/users/create', [TableUsersController::class, 'create']);
//Route::post('/users', [TableUsersController::class, 'store']);
//Route::post('users', [TableUsersController::class, 'store']);
//Route::post('/users',[TableUsersController::class, 'store']);

//Route::post('/users', static function(\Illuminate\Http\Request $request) {
//     \App\Models\TableUsers::create($request->all());
//     redirect('/users');
//});

Route::get('test', static function () {
    dd(csrf_token());
});



// lahore lat long
// 74.3587
// 31.5204



