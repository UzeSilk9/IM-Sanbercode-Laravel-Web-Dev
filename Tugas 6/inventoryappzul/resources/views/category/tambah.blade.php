@extends('layouts.master')
@section('title')
   Halaman Tambah Catergory 
@endsection    

@section('content')
<form action="/category" method="POST">
    @csrf
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
{{-- inputan form --}}
  <div class="mb-3">
    <label  class="form-label">Name Category</label>
    <input type="text" name="name" class="form-control" >
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
