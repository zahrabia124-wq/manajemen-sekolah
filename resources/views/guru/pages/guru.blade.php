@extends('guru.index')

@section('title', 'Guru')

@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Guru</h1>
            <p class="subtitle">Kelola data guru Anda.</p>
        </div>
        <a href="{{ route('guru.create') }}" class="btn btn-primary">+ Tambah Guru</a>
    </header>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="card">
        <div class="toolbar">
            <input type="search" id="searchData" class="search" placeholder="Cari nama guru...">
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Mata Pelajaran</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="daftarData">
                    @forelse ($guru as $item)
                        <tr data-nama="{{ strtolower($item->nama) }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('guru.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada data guru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
