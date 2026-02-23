<?php

use App\Http\Controllers\Auth\AnggotaController as AuthAnggotaController;
use App\Http\Controllers\Auth\PetugasController as AuthPetugasController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Petugas\AnggotaController;
use App\Http\Controllers\Petugas\BukuController;
use App\Http\Controllers\Petugas\PeminjamanController;
use App\Http\Controllers\Petugas\PengembalianController;
use App\Http\Controllers\Petugas\PetugasController;
use Illuminate\Support\Facades\Route;

// anggota routes not auth
Route::get('/', [FrontController::class, 'index'])->name('beranda');
Route::get('/anggota/daftar-buku', [FrontController::class, 'daftarBuku'])->name('anggota.daftar-buku');
Route::get('/anggota/peminjaman', [FrontController::class, 'peminjaman'])->name('anggota.peminjaman');

// petugas routes auth
Route::get('/petugas/register',[AuthPetugasController::class, 'register'])->name('petugas.register');
Route::get('/petugas/login',[AuthPetugasController::class, 'login'])->name('petugas.login');
Route::post('/petugas/register', [AuthPetugasController::class, 'prossesRegister'])->name('petugas.prosses.register');
Route::post('/petugas/login', [AuthPetugasController::class, 'prossesLogin'])->name('petugas.prosses.login');

// anggota routes auth
Route::get('/anggota/register',[AuthAnggotaController::class, 'register'])->name('anggota.register');
Route::get('/anggota/login',[AuthAnggotaController::class, 'login'])->name('anggota.login');
Route::post('/anggota/register', [AuthAnggotaController::class, 'prossesRegister'])->name('anggota.prosses.register');
Route::post('/anggota/login', [AuthAnggotaController::class, 'prossesLogin'])->name('anggota.prosses.login');

// petugas routes with auth middleware
Route::middleware(['auth:petugas'])->group(function () {
    Route::post('/petugas/logout', [AuthPetugasController::class, 'logout'])->name('petugas.logout');

    Route::get('/petugas/dashboard', function () {
        return view('pages.petugas.dashboard');
    })->name('dashboard');

    // buku routes
    Route::get('/petugas/dashboard/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/petugas/dashboard/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/petugas/dashboard/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/petugas/dashboard/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/petugas/dashboard/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/petugas/dashboard/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    // peminjaman routes
    Route::get('/petugas/dashboard/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/petugas/dashboard/peminjaman/show/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');

    // pengembalian routes
    Route::get('/petugas/dashboard/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::get('/petugas/dashboard/pengembalian/show/{id}', [PengembalianController::class, 'show'])->name('pengembalian.show');

    // anggota routes
    Route::get('/petugas/dashboard/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/petugas/dashboard/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::get('/petugas/dashboard/anggota/show/{id}', [AnggotaController::class, 'show'])->name('anggota.show');
    Route::post('/petugas/dashboard/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/petugas/dashboard/anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/petugas/dashboard/anggota/update/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/petugas/dashboard/anggota/destroy/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

    // petugas routes
    Route::get('/petugas/dashboard/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('/petugas/dashboard/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
    Route::post('/petugas/dashboard/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/dashboard/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::put('/petugas/dashboard/petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/dashboard/petugas/destroy/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
});

// anggota routes with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::post('/anggota/logout', [AuthAnggotaController::class, 'logout'])->name('anggota.logout');

    Route::post('/anggota/pinjam/{id}', [FrontController::class, 'pinjam'])->name('anggota.pinjam');
    Route::post('/anggota/pengembalian/{id}', [FrontController::class, 'pengembalian'])->name('anggota.pengembalian');
});



