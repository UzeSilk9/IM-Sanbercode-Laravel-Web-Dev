@extends('layouts.master')
@section('title')
   Halaman Transactions
@endsection    

@section('content')
{{-- //Eror Validation --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/transactions" method="POST">
    @csrf
{{-- inputan form --}}
  <div class="mb-3">
    <label  class="form-label">Product</label>
    <select name="product_id" id="" class="form-control">
        <option value="">--Pilih Product--</option>
        @forelse ($product as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @empty
            <option value="">Product Kosong</option>
        @endforelse
    </select>
  </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Transaksi</label>
        <input type="date" name="created_at" class="form-control" cols="30" rows="10"></input>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Update</label>
        <input type="date" name="updated_at" class="form-control" cols="30" rows="10"></input>
    </div>
    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control" cols="30" rows="10">
        <option value="">--Pilih Type Transaksi--</option>
        <option value="in">In</option>
        <option value="out">Out</option>
        </select>
        
    </div>
    <div class="mb-3">
        <label class="form-label">Amount</label>
        <input type="number" name="amount" class="form-control" cols="30" rows="10"></input>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
