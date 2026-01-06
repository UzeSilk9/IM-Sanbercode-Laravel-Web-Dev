<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/register', [FormController::class,  'inputan'])->name('register');

Route::post('/daftar', [FormController::class, 'daftar']);