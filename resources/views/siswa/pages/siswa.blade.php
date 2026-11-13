@extends('siswa.index')

@section('title', 'Siswa')

@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Siswa</h1>
            <p class="subtitle">Kelola data siswa Anda.</p>
        </div>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="daftarData">
                    @forelse ($siswa as $item)
                        <tr data-nama="{{ strtolower($item->nama) }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>Kelas {{ $item->kelas }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('siswa.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
