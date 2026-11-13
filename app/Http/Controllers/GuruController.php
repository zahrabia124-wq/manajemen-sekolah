<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //index -> halaman utama
    public function index()
    {
        $guru = Guru::get();
        return view('guru.pages.guru', compact('guru'));
    }

    //create -> menampilkan halaman tambah
    public function create()
    {
        return view('guru.pages.tambah');
    }

    //store -> menjalankan fungsi tambah
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:30|unique:gurus,nip',
            'nama' => 'required|string|max:100',
            'mata_pelajaran' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'mata_pelajaran' => $request->mata_pelajaran,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('guru.table')->with('success', 'Data berhasil ditambahkan');
    }

    //edit -> menampilkan halaman update
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.pages.update', compact('guru'));
    }

    //update -> menjalankan fungsi edit data
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|string|max:30|unique:gurus,nip,' . $guru->id,
            'nama' => 'required|string|max:100',
            'mata_pelajaran' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        $guru->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'mata_pelajaran' => $request->mata_pelajaran,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('guru.table')->with('success', 'Data berhasil diperbarui');
    }

    //destroy -> menghapus data
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.table')->with('success', 'Data berhasil dihapus');
    }
}
