<?php

use App\Http\Controllers\MesonetApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-weather-via-http', [MesonetApiController::class, 'getMesonetApiResultViaHttp']);
Route::get('/get-weather-via-otif-curl', [MesonetApiController::class, 'getMesonetApiResultViaOtifCurl']);
Route::get('/get-weather-via-curl', [MesonetApiController::class, 'getMesonetApiResultViaCurl']);
