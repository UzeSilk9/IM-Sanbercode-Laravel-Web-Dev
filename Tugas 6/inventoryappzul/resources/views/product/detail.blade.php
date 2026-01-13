@extends('layouts.master')

@section('title','Halaman Detail Product')

@section('content')
    <img src="{{ asset('image/'.$product->image) }}" width="100%" height="400px" alt="">
    <h1 class="text-primary">{{ $product->name }}</h1>
    <p class="">{{ $product->description }}</p>
    <p class=""> Stock :{{ $product->stock }}</p>
    <p class=""> Price :{{ $product->price }}</p>

    <a class="btn btn-secondary btn-sm my-3" href="/product">Back</a>
@endsection