@extends('layouts.master')

@section('title')
    Halaman Data Categoty
@endsection

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    </div>    
@endif
<a href="/category/create" class="btn btn-primary btn-sm my-3 ">Tambah</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name Category</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $isi)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $isi ->name }}</td>
      <td>  
            
            <form action="/category/{{ $isi->id }}" method="POST">
                @csrf
                @method("DELETE")
            <a href="/category/{{ $isi->id }}" class="btn btn-info btn-sm">Detail</a>
            <a href="/category/{{ $isi->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            <input type="submit" name="" id="" class="btn btn-danger btn-sm" value="Delete">
            </form>
        </td>
      
    </tr>
    @empty
    <tr>
        <td colspan="3">Data Category Masih Kosong Silahkan Ditambah Terlebih Dahulu</td>
    </tr>
@endforelse
    
  </tbody>
</table>
@endsection