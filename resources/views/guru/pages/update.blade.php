@extends('guru.index')

@section('title', 'Update Guru')

@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Update Guru</h1>
            <p class="subtitle">Perbarui informasi guru.</p>
        </div>
    </header>

    <section class="card form-card">
        <form id="formUpdate" action="{{ route('guru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nip">NIP <span class="required">*</span></label>
                <input type="text" id="nip" name="nip" value="{{ old('nip', $guru->nip) }}" required>
                @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama <span class="required">*</span></label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $guru->nama) }}" required>
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran <span class="required">*</span></label>
                <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}" required>
                @error('mata_pelajaran') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat <span class="required">*</span></label>
                <textarea id="alamat" name="alamat" required>{{ old('alamat', $guru->alamat) }}</textarea>
                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('guru.table') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Guru</button>
            </div>
        </form>
    </section>
</main>
@endsection
