<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;

Route::middleware([AuthenticateMiddleware::class])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully');
    })->name('logout');
});

Route::middleware(['guest'])->group(function () {
    
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('register.post');
});
