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
        Route::get('/login', 'showLoginForm')->name('auth.login');
        Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login');
        Route::get('/registration', 'showRegistrationForm')->name('auth.registration');
        Route::post('/registration', [AuthController::class, 'registrationAttempt'])->name('registration');
        Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('auth.forget.password');
        Route::post('/forget-password', [AuthController::class, 'forgetPasswordAttempt'])->name('forget.password');
        Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('auth.reset.password');
        Route::post('/reset-password', [AuthController::class, 'resetPasswordAttempt'])->name('reset.password');
    });
});

Route::middleware('auth')->group(function (){
    Route::controller(ProfileController::class)->group(function (){
        Route::get('/profile', 'index');
    });
});


Route::controller(DashboardController::class)->group(function (){
    Route::get('/dashboard', 'index')->name('dashboard');
});

