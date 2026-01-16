<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    return view('welcome', [
        'totalProducts' => Product::count(),
        'totalIn' => Transaction::where('type', 'in')->count(),
        'totalOut' => Transaction::where('type', 'out')->count(),
        'totalStaff' => User::count(),
        'latestTransactions' => Transaction::with(['product', 'user'])->latest()->take(5)->get(),
    ]);
}

}
