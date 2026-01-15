@extends('layouts.master')

@section('title')
    Halaman Data Product
@endsection

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    </div>    
@endif
 @if (Auth::check() &&  Auth::user()->role === 'admin')
<a href="/product/create" class="btn btn-primary btn-sm my-3 ">Tambah</a>
@endif
<div class="row">
@forelse ($product as $item)
        <div class="col-4"> <!-- ① buka -->
    <div class="card" style="width: 18rem;"> <!-- ② buka -->
        <img src="{{ asset('image/' . $item->image) }}" height="200px" class="card-img-top" alt="...">
        
        <div class="card-body"> <!-- ③ buka -->
            <h5 class="card-title">{{ $item->name }}</h5>
            <span class="badge bg-info text-shadow-amber-200">{{ $item->category->name }}</span>
            <p class="card-text">{{ Str::limit($item->description, 150, '(...)') }}</p>
            <div class="d-grid mb-2"> <!-- ④ buka -->
                <a href="/product/{{ $item->id }}" class="btn btn-primary">Click Here!</a>
            </div> <!-- ④ tutup -->
             @if (Auth::check() &&  Auth::user()->role === 'admin')
            <div class="row my-3"> <!-- ⑤ buka -->
                <div class="col"> <!-- ⑥ buka -->
                    <div class="d-grid mb-2"> <!-- ⑦ buka -->
                        <a href="/product/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    </div> <!-- ⑦ tutup -->
                </div> <!-- ⑥ tutup -->
                
                <div class="col"> <!-- ⑧ buka -->
                    <div class="d-grid"> <!-- ⑨ buka -->
                        <form action="/product/{{ $item->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                    </div> <!-- ⑨ tutup -->
                </div> <!-- ⑧ tutup -->
            </div> <!-- ⑤ tutup -->
            @endif
        </div> <!-- ③ tutup -->
    </div> <!-- ② tutup -->
</div> <!-- ① tutup -->

@empty
    <tr>
        <td colspan="3">Data Product Masih Kosong Silahkan Ditambah Terlebih Dahulu</td>
    </tr>
@endforelse

</div>

@endsection