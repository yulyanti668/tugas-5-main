@extends('layouts.app')

@section('title', 'Update Avatar Profile')

@section('heading', 'Update Avatar Profile')

@section('content')
    <div class="card-header">
        <h1>Form Update Avatar</h1>
    </div>
    <div class="card-body">        
        <form action="{{ route('profile-store', [$profile->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file">
                @error('file')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Submit</button>
            <a href="{{ route('profile') }}" class="btn btn-danger">Kembali</a>
        </form>
    </div>
@endsection