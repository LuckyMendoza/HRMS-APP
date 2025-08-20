<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;




Route::view('/', 'home.index');


// Routes intended for unauthenticated users
Route::middleware('guest')->group(function () {
	// Login / Register via LoginRegisterController
	Route::controller(LoginRegisterController::class)->group(function () {
		Route::get('/login', 'login')->name('login');
		Route::post('/register', 'register')->name('register');
	});

	// Password reset (request & reset form)
	Route::controller(ForgotPasswordController::class)->group(function () {
		Route::get('/forgot-password', 'showLinkRequestForm')->name('password.request');
		Route::post('/forgot-password', 'sendResetLinkEmail')->name('password.email');
	});

	Route::controller(ResetPasswordController::class)->group(function () {
		Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
		Route::post('/reset-password', 'reset')->name('password.update');
	});
});

// Routes that require authentication
Route::middleware('auth')->group(function () {
	Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
	Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->name('verification.send');
});
