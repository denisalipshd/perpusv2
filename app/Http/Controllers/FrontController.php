<?php

namespace App\Http\Controllers;

use App\Models\Buku;
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
}
