@extends('layouts.app')

@section('title', 'Halaman Profile')

@section('heading', 'Halaman Profile')

@section('content')

    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                @if (!$profile->avatar == null)
                    <img class="img-profile rounded-circle" width="100px" height="100px" src="{{ asset('storage/'. $profile->avatar) }}" alt="...">
                @else
                    <img class="img-profile rounded-circle" width="100px" height="100px" src="{{ asset('img/undraw_profile.svg') }}" alt="...">
                @endif
            </div>
            <div class="col-md-10">
                <h1>{{ $profile->nama }}</h1>
                <a href="{{ route('profile-upload', [$profile->id]) }}" class="btn btn-primary">Ubah Foto Profile</a>
            </div>
        </div>        
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>{{ $profile->nim }}</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>{{ $profile->prodi }}</td>
            </tr>
            <tr>
                <td>Alamat E-mail</td>
                <td>:</td>
                <td><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></td>
            </tr>
        </table>
    </div>

@endsection