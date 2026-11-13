@extends('kehadiran.index')

@section('title', 'Tambah Kehadiran')

@section('content')
<main class="main">
<header class="page-header">
    <div>
        <h1>Tambah Kehadiran</h1>
        <p class="subtitle">Masukkan data kehadiran siswa.</p>
    </div>
</header>

<section class="card form-card">
    <form method="POST" action="{{ route('kehadiran.store') }}">
        @csrf
        <div class="form-group">
            <label for="siswa_id">Siswa <span class="required">*</span></label>
            <select id="siswa_id" name="siswa_id" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswa as $s)
                    <option value="{{ $s->id }}" {{ old('siswa_id') == $s->id ? 'selected' : '' }}>{{ $s->nama }} (Kelas {{ $s->kelas }})</option>
                @endforeach
            </select>
            @error('siswa_id') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal <span class="required">*</span></label>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
            @error('tanggal') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status <span class="required">*</span></label>
            <select id="status" name="status" required>
                <option value="">-- Pilih Status --</option>
                @foreach (['Hadir', 'Izin', 'Sakit', 'Alpa'] as $st)
                    <option value="{{ $st }}" {{ old('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
            </select>
            @error('status') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"
                placeholder="Opsional" maxlength="255">
            @error('keterangan') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('kehadiran.table') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Kehadiran</button>
        </div>
    </form>
</section>
</main>
@endsection
