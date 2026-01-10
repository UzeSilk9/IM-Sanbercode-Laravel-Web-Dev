@extends('layouts.master')

@section('title')
    Halaman Detail
@endsection

@section('content')
    <h1 class="text-primary">{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <a href="/category" class="btn btn-secondary my-3">Kembali</a>
@endsection