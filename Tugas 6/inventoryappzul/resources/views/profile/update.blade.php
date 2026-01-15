@extends('layouts.master')
@section('title')
   Halaman Profile 
@endsection    

@section('content')
<form action="/profile" method="POST">
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

@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
    </div>    
@endif
{{-- inputan form --}}
  <div class="mb-3">
     @csrf
     @method('PUT')
    <label  class="form-label">Age</label>
    <input type="text" name="age" class="form-control" value="{{ old('age', $profile->age) }}">
  </div>
    <div class="mb-3">
    <label class="form-label">Bio</label>
    <textarea name="bio" class="form-control" cols="30" rows="10">{{ old('bio', $profile->bio) }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
