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
//Route::permanentRedirect('/', route('fuel-statistic-form'));

// не авторизированный пользователь
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'attemptLogin']);

    Route::get('/login/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/login/google/callback', [AuthController::class, 'googleCallback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'attemptLogout'])->name('logout');

    Route::redirect('/', '/fuel-statistic/list')->name('home');

    Route::get('/fuel-statistic/form', [FuelStatisticController::class, 'form'])->name('fuel-statistic-form');
    Route::post('/fuel-statistic/form', [FuelStatisticController::class, 'formSend']);
    Route::get('/fuel-statistic/list', [FuelStatisticController::class, 'list'])->name('fuel-statistic-list');
});
