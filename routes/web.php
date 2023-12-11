<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\UserProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::prefix('/auth')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
});
