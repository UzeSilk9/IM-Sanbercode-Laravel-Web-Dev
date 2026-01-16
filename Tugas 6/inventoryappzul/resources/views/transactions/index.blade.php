@extends('layouts.master')

@section('title')
    Halaman Staff
@endsection

@section('content')
    @if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    </div>    
@endif
<a href="/transactions/create" class="btn btn-primary btn-sm my-3 ">Tambah Transaksi</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Staff</th>
      <th scope="col">Product</th>
      <th scope="col">Type Transaksi</th>
      <th scope="col">Amount Transaksi</th>
      @if (Auth::user()->role === 'admin')
      <th scope="col">Action</th>
     @endif
    </tr>
  </thead>
  <tbody>
    @forelse ($transaction as $isi)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $isi ->user->name }}</td>
      <td>{{ $isi ->product->name }}</td>
      <td>{{ $isi ->type }}</td>
      <td>{{ $isi ->amount }}</td>
      @if (Auth::user()->role === 'admin')
      <td> 
            <a href="/transactions/{{ $isi->id }}" class="btn btn-info btn-sm">Detail</a>
        </td>
      @endif
    </tr>
    @empty
    <tr>
        <td colspan="3">Data Transaksi Masih Kosong Silahkan Ditambah Terlebih Dahulu</td>
    </tr>
@endforelse
    
  </tbody>
</table>
@endsection