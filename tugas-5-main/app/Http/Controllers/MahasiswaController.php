<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::all();
        $user = $request->session()->get('user');
        $profile = DB::table('profiles')->where('email', $user->email)->select('profiles.*')->first();

        return view('mahasiswa.index', compact('mahasiswas', 'user', 'profile'));
    }

    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        $profile = DB::table('profiles')->where('email', $user->email)->select('profiles.*')->first();
        
        return view('mahasiswa.create', compact('user', 'profile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:10',
            'nama' => 'required|max:50'
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
        ]);

        session()->flash('success', 'Data Mahasiswa berhasil ditambahkan!');

        return redirect('/mahasiswa');
    }

    public function edit(Request $request, Mahasiswa $mahasiswa)
    {
        $user = $request->session()->get('user');
        $profile = DB::table('profiles')->where('email', $user->email)->select('profiles.*')->first();

        return view('mahasiswa.edit', compact('mahasiswa','user', 'profile'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {

        $validated = $request->validate([
            'nim' => 'required|max:10',
            'nama' => 'required|max:50'
        ]);


        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
        ]);

        session()->flash('success', 'Data Mahasiswa berhasil diubah!');

        return redirect('/mahasiswa');
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        session()->flash('success', 'Data Mahasiswa berhasil dihapus!');

        return redirect('/mahasiswa');
    }
}
