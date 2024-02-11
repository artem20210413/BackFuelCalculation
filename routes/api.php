<?php

use App\Http\Controllers\Api\FuelStatisticController;
use App\Http\Controllers\Api\FuelTypeController;
use App\Http\Controllers\Api\GasStationController;
use App\Http\Controllers\Api\MovementTypeController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\AuthGoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/test', [App\Http\Controllers\TestController::class, 'test']);


Route::post('/login', [AuthenticateController::class, 'login']);
Route::post('/register', [AuthenticateController::class, 'register']);

Route::group(['middleware' => 'web'], function () {
    Route::get('/login/google', [AuthGoogleController::class, 'redirectToGoogle']);
    Route::get('/login/google/callback', [AuthGoogleController::class, 'handleGoogleCallback']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/gas-station', [GasStationController::class, 'list']);
    Route::get('/movement-type', [MovementTypeController::class, 'list']);
    Route::get('/fuel-type', [FuelTypeController::class, 'list']);

    Route::post('/fuel-statistic', [FuelStatisticController::class, 'save']);
    Route::get('/fuel-statistic', [FuelStatisticController::class, 'list']);

    Route::get('/user', [AuthenticateController::class, 'user']);
    Route::get('/logout', [AuthenticateController::class, 'logout']);
});


//Route::post('/tokens/create', function (Request $request) {
//    $token = $request->user
////Route::middleware(['auth:sanctum', EnumTokenAbilities::ability(EnumTokenAbilities::TEST)])->group(function () {()->createToken($request->token_name);
//
//    return ['token' => $token->plainTextToken];
//});
