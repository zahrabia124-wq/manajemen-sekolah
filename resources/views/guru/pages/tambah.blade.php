@extends('guru.index')

@section('title', 'Tambah Guru')

@section('content')
<main class="main">
<header class="page-header">
    <div>
        <h1>Tambah Guru</h1>
        <p class="subtitle">Masukkan informasi guru baru.</p>
    </div>
</header>

<section class="card form-card">
    <form method="POST" action="{{ route('guru.store') }}">
        @csrf
        <div class="form-group">
            <label for="nip">NIP <span class="required">*</span></label>
            <input type="text" id="nip" name="nip" value="{{ old('nip') }}"
                placeholder="Contoh: 198001012005011001" maxlength="30" required>
            @error('nip') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama <span class="required">*</span></label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                placeholder="Contoh: Pak Budi" maxlength="100" required>
            @error('nama') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="mata_pelajaran">Mata Pelajaran <span class="required">*</span></label>
            <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}"
                placeholder="Contoh: Pemrograman Web" maxlength="100" required>
            @error('mata_pelajaran') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat <span class="required">*</span></label>
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                placeholder="Contoh: Ciamis" maxlength="255" required>
            @error('alamat') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('guru.table') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Guru</button>
        </div>
    </form>
</section>
</main>
@endsection
