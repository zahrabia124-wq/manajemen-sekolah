@extends('kehadiran.index')

@section('title', 'Update Kehadiran')

@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Update Kehadiran</h1>
            <p class="subtitle">Perbarui data kehadiran.</p>
        </div>
    </header>

    <section class="card form-card">
        <form id="formUpdate" action="{{ route('kehadiran.update', $kehadiran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="siswa_id">Siswa <span class="required">*</span></label>
                <select id="siswa_id" name="siswa_id" required>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->id }}" {{ old('siswa_id', $kehadiran->siswa_id) == $s->id ? 'selected' : '' }}>{{ $s->nama }} (Kelas {{ $s->kelas }})</option>
                    @endforeach
                </select>
                @error('siswa_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal <span class="required">*</span></label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $kehadiran->tanggal) }}" required>
                @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status <span class="required">*</span></label>
                <select id="status" name="status" required>
                    @foreach (['Hadir', 'Izin', 'Sakit', 'Alpa'] as $st)
                        <option value="{{ $st }}" {{ old('status', $kehadiran->status) == $st ? 'selected' : '' }}>{{ $st }}</option>
                    @endforeach
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $kehadiran->keterangan) }}" maxlength="255">
                @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('kehadiran.table') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Kehadiran</button>
            </div>
        </form>
    </section>
</main>
@endsection
