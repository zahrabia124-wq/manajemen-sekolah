@extends('siswa.index')

@section('title', 'Tambah Siswa')

@section('content')
<main class="main">
<header class="page-header">
    <div>
        <h1>Tambah Siswa</h1>
        <p class="subtitle">Masukkan informasi siswa baru.</p>
    </div>
</header>

<section class="card form-card">
    <form method="POST" action="{{ route('siswa.store') }}">
        @csrf
        <div class="form-group">
            <label for="nis">NIS <span class="required">*</span></label>
            <input type="text" id="nis" name="nis" value="{{ old('nis') }}"
                placeholder="Contoh: 1001" maxlength="30" required>
            @error('nis') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama <span class="required">*</span></label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                placeholder="Contoh: Andi" maxlength="100" required>
            @error('nama') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="kelas">Kelas <span class="required">*</span></label>
            <select id="kelas" name="kelas" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach (['10', '11', '12'] as $k)
                    <option value="{{ $k }}" {{ old('kelas') == $k ? 'selected' : '' }}>Kelas {{ $k }}</option>
                @endforeach
            </select>
            @error('kelas') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="alamat">Alamat <span class="required">*</span></label>
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                placeholder="Contoh: Ciamis" maxlength="255" required>
            @error('alamat') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('siswa.table') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Siswa</button>
        </div>
    </form>
</section>
</main>
@endsection
