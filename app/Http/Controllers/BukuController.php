<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('pages.petugas.buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('pages.petugas.buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer|digits:4',
            'jumlah_buku' => 'required|integer',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        } else {
            $coverPath = null;
        }

        Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_buku' => $request->jumlah_buku,
            'cover' => $coverPath,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.petugas.buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer|digits:4',
            'jumlah_buku' => 'required|integer',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $buku = Buku::findOrFail($id);

        if($request->hasFile('cover')) {
            if($buku->cover && Storage::disk('public')->exists($buku->cover)) {
                Storage::disk('public')->delete($buku->cover);
            }

            $coverPath = $request->file('cover')->store('covers', 'public');
            $buku->cover = $coverPath;
        }
            
        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_buku' => $request->jumlah_buku,
            'cover' => $buku->cover,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
