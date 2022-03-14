<?php

use App\Http\Controllers\TableUsersController;
use App\Models\TableUsers;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', static function () {
    return view('dashboard');
});

Route::resource('/users', TableUsersController::class);

// Route::view('/change', 'change');


Route::get('/change', function() {
    return view('change', ['users' => TableUsers::all()]);
});


// dummy code to overrite the datatable css with theme styles
// Route::get('/change', static function () {
//     return view('change', ['users' => TableUsers::all()]);
// });

Route::view('/modal', 'modal');



// lahore lat long
// 74.3587
// 31.5204