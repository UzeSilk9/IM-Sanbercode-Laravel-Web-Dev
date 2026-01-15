@extends('layouts.master')

@section('title')
    Halaman Detail
@endsection

@section('content')
    <h1 class="text-primary">{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category->product as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td><a href="/product/{{ $item->id }}" class="btn btn-info btn-sm">Clik Here</a></td>
            </tr>
            @empty
            <tr>
                <td>Tidak ada product di kategori ini</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="/category" class="btn btn-secondary my-3">Kembali</a>
@endsection