<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', [DashboardController::class, 'home'])->name('home')->middleware('auth');

Route::get('/register', [FormController::class,  'inputan'])->name('register');

Route::post('/daftar', [FormController::class, 'daftar']);

Route::middleware(['auth', 'admin'])->group(function(){
        
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

    });
    
    // CRUD Product
    
    Route::resource('/product', ProductController::class);

Route::middleware(['guest'])->group(function(){


    // Auth
    
    Route::get('/register', [AuthController::class, 'formRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    
    // Login
    Route::get('/login', [AuthController::class,'formLogin']);
    Route::post('/login', [AuthController::class,'login'])->name('login');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout']);