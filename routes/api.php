<?php

use App\Http\Controllers\MesonetApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\EmployeeController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-weather-via-http', [MesonetApiController::class, 'getMesonetApiResultViaHttp']);
Route::get('/get-weather-via-otif-curl', [MesonetApiController::class, 'getMesonetApiResultViaOtifCurl']);
Route::get('/get-weather-via-curl', [MesonetApiController::class, 'getMesonetApiResultViaCurl']);

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);
Route::apiResource('/employee', EmployeeController::class)->middleware('auth:api');








