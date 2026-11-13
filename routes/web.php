<?php

use App\Http\Controllers\AuthController as LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KehadiranController;

// Halaman Utama mengarah ke halaman Login
Route::get('/', function(){
    return redirect()->route('login');
});

// Login Page
Route::prefix('login')->group(function(){
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
});

// ROLE GURU
Route::prefix('guru')->as('guru.')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('table');
    Route::get('/tambah', [GuruController::class, 'create'])->name('create');
    Route::post('/tambah', [GuruController::class, 'store'])->name('store');
    Route::get('/update/{id}', [GuruController::class, 'edit'])->name('edit');
    Route::put('/update/{guru}', [GuruController::class, 'update'])->name('update');
    Route::delete('/delete/{guru}', [GuruController::class, 'destroy'])->name('destroy');
});

// JADWAL
Route::prefix('jadwal')->as('jadwal.')->group(function () {
    Route::get('/', [JadwalController::class, 'index'])->name('table');
    Route::get('/tambah', [JadwalController::class, 'create'])->name('create');
    Route::post('/tambah', [JadwalController::class, 'store'])->name('store');
    Route::get('/update/{id}', [JadwalController::class, 'edit'])->name('edit');
    Route::put('/update/{jadwal}', [JadwalController::class, 'update'])->name('update');
    Route::delete('/delete/{jadwal}', [JadwalController::class, 'destroy'])->name('destroy');
});

// ROLE SISWA
Route::prefix('siswa')->as('siswa.')->group(function () {
    Route::get('/', [SiswaController::class, 'index'])->name('table');
    Route::get('/tambah', [SiswaController::class, 'create'])->name('create');
    Route::post('/tambah', [SiswaController::class, 'store'])->name('store');
    Route::get('/update/{id}', [SiswaController::class, 'edit'])->name('edit');
    Route::put('/update/{siswa}', [SiswaController::class, 'update'])->name('update');
    Route::delete('/delete/{siswa}', [SiswaController::class, 'destroy'])->name('destroy');
});

// KEHADIRAN
Route::prefix('kehadiran')->as('kehadiran.')->group(function () {
    Route::get('/', [KehadiranController::class, 'index'])->name('table');
    Route::get('/tambah', [KehadiranController::class, 'create'])->name('create');
    Route::post('/tambah', [KehadiranController::class, 'store'])->name('store');
    Route::get('/update/{id}', [KehadiranController::class, 'edit'])->name('edit');
    Route::put('/update/{kehadiran}', [KehadiranController::class, 'update'])->name('update');
    Route::delete('/delete/{kehadiran}', [KehadiranController::class, 'destroy'])->name('destroy');
});
