<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\FuelStatisticController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'login']);
Route::get('/fuel-statistic/form', [FuelStatisticController::class, 'fuelStatisticForm']);
Route::post('/fuel-statistic/form', [FuelStatisticController::class, 'fuelStatisticFormSend']);

Route::get('/login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [AuthController::class, 'googleCallback']);
Route::post('/login', [AuthController::class, 'attemptLogin']);
