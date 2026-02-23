<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with(['peminjaman.user', 'peminjaman.buku'])->latest()->get();
        return view('pages.petugas.pengembalian.index', compact('pengembalians'));
    }

    public function show($id)
    {
        $pengembalian = Pengembalian::with(['peminjaman.user', 'peminjaman.buku', 'petugas'])->findOrFail($id);
        return view('pages.petugas.pengembalian.show', compact('pengembalian'));
    }
}
