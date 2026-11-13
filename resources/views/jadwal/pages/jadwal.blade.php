@extends('jadwal.index')

@section('title', 'Jadwal')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Jadwal Mengajar</h1>
                <p class="subtitle">Kelola jadwal mengajar Anda.</p>
            </div>
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary">+ Tambah Jadwal</a>
        </header>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <section class="card">
            <div class="toolbar">
                <input type="search" id="searchData" class="search" placeholder="Cari kelas...">
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="daftarData">
                        @forelse ($jadwal as $item)
                            <tr data-nama="{{ strtolower($item->kelas) }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mapel }}</td>
                                <td>Kelas {{ $item->kelas }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ substr($item->jam_mulai, 0, 5) }}</td>
                                <td>{{ substr($item->jam_selesai, 0, 5) }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('jadwal.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Belum ada data jadwal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection
