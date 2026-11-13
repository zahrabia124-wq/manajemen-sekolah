@extends('jadwal.index')

@section('title', 'Update Jadwal')

@section('content')
    <main class="main">
        <header class="page-header">
            <div>
                <h1>Update Jadwal</h1>
                <p class="subtitle">Perbarui informasi jadwal.</p>
            </div>
        </header>

        <section class="card form-card">
            <form id="formUpdate" action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran<span class="required">*</span></label>
                    <input type="text" id="mapel" name="mapel" value="{{ old('mapel', $jadwal->mapel) }}" required>
                    @error('mapel')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas <span class="required">*</span></label>
                    <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $jadwal->kelas) }}" required>
                    @error('kelas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hari">Hari <span class="required">*</span></label>
                    <input type="text" id="hari" name="hari" value="{{ old('hari', $jadwal->hari) }}" required>
                    @error('hari')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai <span class="required">*</span></label>
                    <input type="time" id="jam_mulai" name="jam_mulai"
                        value="{{ old('jam_mulai', substr($jadwal->jam_mulai, 0, 5)) }}" required>
                    @error('jam_mulai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai <span class="required">*</span></label>
                    <input type="time" id="jam_selesai" name="jam_selesai"
                        value="{{ old('jam_selesai', substr($jadwal->jam_selesai, 0, 5)) }}" required>
                    @error('jam_selesai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('jadwal.table') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Jadwal</button>
                </div>
            </form>
        </section>
    </main>
@endsection
