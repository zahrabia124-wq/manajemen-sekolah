@extends('jadwal.index')

@section('title', 'Tambah Jadwal')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Tambah Jadwal</h1>
                <p class="subtitle">Masukkan informasi jadwal baru.</p>
            </div>
        </header>

        <section class="card form-card">
            <form method="POST" action="{{ route('jadwal.store') }}">
                @csrf
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran <span class="required">*</span></label>
                    <input type="text" id="mapel" name="mapel" value="{{ old('mapel') }}"
                        placeholder="Contoh: Pemrograman Web" maxlength="100" required>
                    @error('mapel')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas <span class="required">*</span></label>
                    <select id="kelas" name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach (['10', '11', '12'] as $k)
                            <option value="{{ $k }}" {{ old('kelas') == $k ? 'selected' : '' }}>Kelas
                                {{ $k }}</option>
                        @endforeach
                    </select>
                    @error('kelas')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hari">Hari <span class="required">*</span></label>
                    <input type="text" id="hari" name="hari" value="{{ old('hari') }}"
                        placeholder="Contoh: Senin" maxlength="20" required>
                    @error('hari')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai <span class="required">*</span></label>
                    <input type="time" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
                    @error('jam_mulai')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai <span class="required">*</span></label>
                    <input type="time" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
                    @error('jam_selesai')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('jadwal.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                </div>
            </form>
        </section>
    </main>
@endsection
