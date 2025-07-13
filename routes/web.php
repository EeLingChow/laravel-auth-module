<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [UserController::class, 'editPassword'])->name('profile.edit-password');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('/login-logs', [UserController::class, 'loginLogs'])->name('login.logs');
});
