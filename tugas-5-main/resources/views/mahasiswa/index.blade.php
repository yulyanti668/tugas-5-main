@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('heading', 'Data Mahasiswa')

@section('content')
    <div class="card-header">
        <a href="{{ route('create-mahasiswa') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%">
                <thead>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('edit-mahasiswa', [$mhs->id]) }}" class="btn btn-secondary mr-2">Edit</a>
                                <form action="{{ route('delete-mahasiswa', [$mhs->id]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- </div> --}}
@endsection
