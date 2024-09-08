@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('heading', 'Tambah Mahasiswa')

@section('content')
    <div class="card-header">
        <h2>Tambah Data Mahasiswa</h2>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('store-mahasiswa') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Isikan NIM">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/mahasiswa" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
    
@endsection
    