<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RedirectController::class, 'index'])->name('/');

Route::get('/register', [RedirectController::class,'registerpage'])->name('register');

Route::get('/dashboard', [RedirectController::class,'dashboard'])->name('dashboard');
