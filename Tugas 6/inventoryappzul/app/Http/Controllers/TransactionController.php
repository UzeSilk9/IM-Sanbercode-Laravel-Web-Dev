<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->role === 'admin'){
            $transactions = Transaction::get();
        }else{
            $transactions = Transaction::where('user_id', $user->id)->get();
        }
        return view('transactions.index', ['transaction' =>$transactions]);
    }

    public function create(){
        $product = Product::get();

        return view('transactions.create', ['product' => $product]);
    }

    public function store(Request $request){

    // validations
        $request->validate([
        'product_id' => 'required',
        'created_at' => 'required|date',
        'updated_at' => 'required|date',
        'type' => 'required|in:in,out',
        'amount' => 'required|integer|min:1',
        ]);

        $id_user = Auth::id();
        $transactions = new Transaction;
        $transactions->product_id = $request->input('product_id');
        $transactions->product_id = $request->input('created_at');
        $transactions->product_id = $request->input('updated_at');
        $transactions->product_id = $request->input('type');
        $transactions->product_id = $request->input('amount');

        $transactions->user_id = $id_user;

        // $transactions->save();

        $product = Product::find($request->input('product_id'));
        
        $product = Product::findOrFail($request->input('product_id'));
        $type = $request->input('type');
        $amount = $request->input('amount');

    if ($type === 'in') {
        // Barang masuk → stok bertambah
        $product->increment('stock', $amount);

    } elseif ($type === 'out') {
        // Barang keluar → stok berkurang
        if ($product->stock < $amount) {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }
        $product->decrement('stock', $amount);
    }

    // Simpan transaksi
    Transaction::create([
        'product_id' => $product->id,
        'user_id' => Auth::id(),
        'type' => $type,
        'amount' => $amount,
        ]);

        return redirect('/transactions')->with('success', 'Transactions has Created');
    }

    public function show($id)
    {
       $isi = Transaction::with(['user', 'product'])->findOrFail($id);
    return view('transactions.detail', compact('isi'));
    }

    }
    