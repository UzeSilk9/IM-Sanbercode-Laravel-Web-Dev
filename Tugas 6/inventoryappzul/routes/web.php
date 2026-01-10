<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoryController;

Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/register', [FormController::class,  'inputan'])->name('register');

Route::post('/daftar', [FormController::class, 'daftar']);

//CRUD categories
//->Create categories
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);

// -> Read Categories
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);

// -> Update Categories
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);

// -> Delete Categories
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);