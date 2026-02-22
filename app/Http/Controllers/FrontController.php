<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->take(6)->get();
        $anggota = Auth::user();
        return view('pages.anggota.beranda', compact('bukus', 'anggota'));
    }
    
    public function daftarBuku()
    {
        $bukus = Buku::latest()->get();
        $anggota = Auth::user();
        return view('pages.anggota.daftar-buku', compact('bukus', 'anggota'));
    }


    public function peminjaman()
    {
        $user_id = Auth::id();
        $peminjamans = Peminjaman::with('buku')->where('user_id', $user_id)->get();
        $petugas = Petugas::all();
        return view('pages.anggota.peminjaman', compact('peminjamans', 'petugas'));
    }

    public function pinjam(Request $request, $id)
    {
        $request->validate([
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after:tgl_pinjam',
        ]);

        $buku = Buku::findOrFail($id);
        $user_id = Auth::id();

        if ($buku->jumlah_buku < 1) {
            return redirect()->back()->with('error', 'Maaf, stok buku tidak tersedia.');
        }

        $buku->update([
            'jumlah_buku' => $buku->jumlah_buku - 1,
        ]);

        Peminjaman::create([
            'user_id' => $user_id,
            'buku_id' => $id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
    }

    public function pengembalian(Request $request, $id)
    {
        $request->validate([
            'petugas_id' => 'required|exists:petugas,id',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::findOrFail($peminjaman->buku_id);

        // hitung denda
        $tgl_kembali = \Carbon\Carbon::parse($peminjaman->tgl_kembali);
        $tgl_pengembalian = \Carbon\Carbon::parse(now());
        $denda = 0;

        if ($tgl_pengembalian->gt($tgl_kembali)) {
            $hari_terlambat = $tgl_pengembalian->diffInDays($tgl_kembali);
            $denda = $hari_terlambat * 5000; // denda per hari
        }

        Pengembalian::create([
            'peminjaman_id' => $id,
            'petugas_id' => $request->petugas_id,
            'tgl_pengembalian' => now(),
            'denda' => $denda,
        ]);

        $buku->update([
            'jumlah_buku' => $buku->jumlah_buku + 1,
        ]);

        $peminjaman->delete();

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
}
