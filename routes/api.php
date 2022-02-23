<?php

use App\Http\Controllers\{
    StudentApiController,
    WeatherMapController,
    PlayWithApiController,
    GetApiResults
};

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




Route::get('/getResultOne', [WeatherMapController::class, 'usingHttp']);




// three ways of getting results from api calls
Route::get('/getResultWithPhp', [GetApiResults::class, 'getResultwithPhp']);
Route::get('/getResultWithCurl', [GetApiResults::class, 'getResultWithCurl']);
Route::get('/getResultWithHttp', [GetApiResults::class, 'getResultWithHttp']);

// api routes for studentApiController Controller
Route::get('/students', [StudentApiController::class, 'getAllStudents']);
Route::get('/students/{id}', [StudentApiController::class, 'getStudent']);
Route::post('/students', [StudentApiController::class, 'createStudent']);
Route::put('/students/{id}', [StudentApiController::class, 'updateRecord']);
Route::delete('/students/{id}', [StudentApiController::class, 'deleteRecord']);

// playing with curl statements, and practicing codes, endpoints for curl practice
Route::get('/curl1', [PlayWithApiController::class, 'playWithGetCurl']);
Route::get('/curl2', [PlayWithApiController::class, 'playWithPostCurl']);
Route::get('/curl3', [PlayWithApiController::class, 'postCurlPostmanCode']);


