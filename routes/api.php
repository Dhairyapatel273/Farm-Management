<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/register', [LoginController::class, 'register'])->name('register');