@extends('kehadiran.index')

@section('title', 'Kehadiran')

@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Kehadiran</h1>
            <p class="subtitle">Kelola data kehadiran siswa.</p>
        </div>
        <a href="{{ route('kehadiran.create') }}" class="btn btn-primary">+ Tambah Kehadiran</a>
    </header>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="card">
        <div class="toolbar">
            <input type="search" id="searchData" class="search" placeholder="Cari nama siswa...">
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="daftarData">
                    @forelse ($kehadiran as $item)
                        <tr data-nama="{{ strtolower($item->siswa->nama ?? '') }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->siswa->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('kehadiran.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('kehadiran.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada data kehadiran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
