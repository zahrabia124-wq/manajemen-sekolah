<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //index -> halaman utama
    public function index()
    {
        $siswa = Siswa::get();
        return view('siswa.pages.siswa', compact('siswa'));
    }

    //create -> menampilkan halaman tambah
    public function create()
    {
        return view('siswa.pages.tambah');
    }

    //store -> menjalankan fungsi tambah
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:30|unique:siswas,nis',
            'nama' => 'required|string|max:100',
            'kelas' => 'required|in:10,11,12',
            'alamat' => 'required|string|max:255',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('siswa.table')->with('success', 'Data berhasil ditambahkan');
    }

    //edit -> menampilkan halaman update
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.pages.update', compact('siswa'));
    }

    //update -> menjalankan fungsi edit data
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|string|max:30|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required|string|max:100',
            'kelas' => 'required|in:10,11,12',
            'alamat' => 'required|string|max:255',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('siswa.table')->with('success', 'Data berhasil diperbarui');
    }

    //destroy -> menghapus data
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.table')->with('success', 'Data berhasil dihapus');
    }
}
