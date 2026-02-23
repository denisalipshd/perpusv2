<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = User::latest()->get();
        return view('pages.petugas.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('pages.petugas.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show($id)
    {
        $anggota = User::findOrFail($id);
        return view('pages.petugas.anggota.show', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = User::findOrFail($id);
        return view('pages.petugas.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$id",
            'password' => 'nullable|string|min:6',
            'password_baru' => 'nullable|string|min:6',
            'konfirmasi_password' => 'nullable|string|min:6|same:password_baru',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
        ]);

        $anggota = User::findOrFail($id);
        $anggota->nama = $request->nama;
        $anggota->email = $request->email;

        // ubah password jika diisi dan validasi password lama benar
        if ($request->password && $request->password_baru && $request->konfirmasi_password) {
            if (Hash::check($request->password, $anggota->password)) {
                if ($request->password_baru === $request->konfirmasi_password) {
                    $anggota->password = Hash::make($request->password_baru);
                } else {
                    return redirect()->back()->withErrors(['konfirmasi_password' => 'Konfirmasi password dan password baru tidak cocok.']);
                }
            } else {
                return redirect()->back()->withErrors(['password' => 'Password lama tidak benar.']);
            }
        }

        $anggota->alamat = $request->alamat;
        $anggota->no_telp = $request->no_telp;
        $anggota->save();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = User::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
