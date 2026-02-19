<?php

use App\Http\Controllers\Auth\AnggotaController;
use App\Http\Controllers\Auth\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

// anggota routes
Route::get('/', [FrontController::class, 'index'])->name('beranda');

// petugas routes
Route::get('/petugas/register',[PetugasController::class, 'register'])->name('petugas.register');
Route::get('/petugas/login',[PetugasController::class, 'login'])->name('petugas.login');
Route::post('/petugas/register', [PetugasController::class, 'prossesRegister'])->name('petugas.prosses.register');
Route::post('/petugas/login', [PetugasController::class, 'prossesLogin'])->name('petugas.prosses.login');

// anggota routes
Route::get('/anggota/register',[AnggotaController::class, 'register'])->name('anggota.register');
Route::get('/anggota/login',[AnggotaController::class, 'login'])->name('anggota.login');
Route::post('/anggota/register', [AnggotaController::class, 'prossesRegister'])->name('anggota.prosses.register');
Route::post('/anggota/login', [AnggotaController::class, 'prossesLogin'])->name('anggota.prosses.login');

// petugas routes with auth middleware
Route::middleware(['auth:petugas'])->group(function () {
    Route::post('/petugas/logout', [PetugasController::class, 'logout'])->name('petugas.logout');

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
});

// anggota routes with auth middleware
Route::middleware(['auth'])->group(function () {
    Route::post('/anggota/logout', [AnggotaController::class, 'logout'])->name('anggota.logout');
});



