<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.petugas.dashboard');
})->name('dashboard');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');



