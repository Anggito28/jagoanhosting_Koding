<?php

use App\Http\Controllers\HealthServiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HouseServiceController;
use App\Http\Controllers\OccupantsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // route penghuni
    Route::resource('occupants', OccupantsController::class);
    // route pelayanan
    Route::resource('pelayanan', HouseServiceController::class);
    //user manage
    Route::resource('manage', UserController::class);
});

// Auth
Route::get('login', [AuthController::class, 'viewAuth'])->name('login.view');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
