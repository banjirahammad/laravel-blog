<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
});
Route::middleware('guest')->group(function (){
    Route::controller(AuthController::class)->group(function (){
        Route::get('/login', 'loginView')->name('auth.login');
        Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login');
        Route::get('/registration', 'registrationView')->name('auth.registration');
        Route::post('/registration', [AuthController::class, 'registrationAttempt'])->name('registration');
        Route::get('/forget-password', [AuthController::class, 'registrationAttempt'])->name('forget.password');
        Route::get('/token-verify', [AuthController::class, 'registrationAttempt'])->name('token.verify');
        Route::get('/reset-password', [AuthController::class, 'registrationAttempt'])->name('reset.password');
    });
});

Route::middleware('auth')->group(function (){
    Route::controller(ProfileController::class)->group(function (){
        Route::get('/profile', 'index');
    });

    Route::controller(DashboardController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});

