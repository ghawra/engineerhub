<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;

Route::get('/register', [loginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [loginController::class, 'register'])->name('register.post'); // Route untuk POST registrasi

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route lainnya
Route::get('/selectregist', function() {
    return view('auth.selectregist');
})->name('selectregist');

Route::get('/pageKosong', function() {
    return view('pageKosong');
})->name('pageKosong');

Route::get('/cv', function() {
    return view('cv');
})->name('cv');