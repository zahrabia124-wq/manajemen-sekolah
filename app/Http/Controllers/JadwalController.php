<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //index -> halaman utama
    public function index()
    {
        $jadwal = Jadwal::get();
        return view('jadwal.pages.jadwal', compact('jadwal'));
    }

    //create -> menampilkan halaman tambah
    public function create()
    {
        return view('jadwal.pages.tambah');
    }

    //store -> menjalankan fungsi tambah
    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required|string|max:100',
            'kelas' => 'required|in:10,11,12',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        Jadwal::create([
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.table')->with('success', 'Data berhasil ditambahkan');
    }

    //edit -> menampilkan halaman update
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.pages.update', compact('jadwal'));
    }

    //update -> menjalankan fungsi edit data
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'mapel' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal->update([
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('jadwal.table')->with('success', 'Data berhasil diperbarui');
    }

    //destroy -> menghapus data
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.table')->with('success', 'Data berhasil dihapus');
    }
}
