<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    //index -> halaman utama
    //index -> halaman utama
    public function index()
    {
        $kehadiran = Kehadiran::with('siswa')->get();
        return view('kehadiran.pages.kehadiran', compact('kehadiran'));
    }

    //create -> menampilkan halaman tambah
    public function create()
    {
        $siswa = Siswa::orderBy('nama')->get();
        return view('kehadiran.pages.tambah', compact('siswa'));
    }

    //store -> menjalankan fungsi tambah
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpa',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Kehadiran::create([
            'siswa_id' => $request->siswa_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kehadiran.table')->with('success', 'Data berhasil ditambahkan');
    }

    //edit -> menampilkan halaman update
    public function edit($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $siswa = Siswa::orderBy('nama')->get();
        return view('kehadiran.pages.update', compact('kehadiran', 'siswa'));
    }

    //update -> menjalankan fungsi edit data
    public function update(Request $request, Kehadiran $kehadiran)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpa',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $kehadiran->update([
            'siswa_id' => $request->siswa_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kehadiran.table')->with('success', 'Data berhasil diperbarui');
    }

    //destroy -> menghapus data
    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('kehadiran.table')->with('success', 'Data berhasil dihapus');
    }
}
