<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

Route::get('/', [DashboardController::class, 'home'])->name('home')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'getProfile'])->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->middleware('auth');

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

Route::middleware(['auth'])->group(function(){
    // GET LIST TRANSACTIONS
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/create', [TransactionController::class, 'create']);
    Route::post('/transactions', [TransactionController::class, 'store']);

    //Admin
    Route::put('/transactions/{$id}', [TransactionController::class, 'update']);


});