@extends('siswa.index')

@section('title', 'Update Siswa')

@section('content')
<main class="main">
    <header class="page-header">
        <div>
            <h1>Update Siswa</h1>
            <p class="subtitle">Perbarui informasi siswa.</p>
        </div>
    </header>

    <section class="card form-card">
        <form id="formUpdate" action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nis">NIS <span class="required">*</span></label>
                <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
                @error('nis') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama <span class="required">*</span></label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" required>
