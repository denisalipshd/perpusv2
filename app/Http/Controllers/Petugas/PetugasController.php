<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::latest()->get();
        return view('pages.petugas.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('pages.petugas.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petugas',
            'password' => 'required|string|min:6',
        ]);

        // Simpan data petugas ke database
        Petugas::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('pages.petugas.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => "required|string|max:255|unique:petugas,username,$id",
            'password' => 'nullable|string|min:6',
            'password_baru' => 'nullable|string|min:6',
            'konfirmasi_password' => 'nullable|string|min:6|same:password_baru',
        ]);

        $petugas = Petugas::findOrFail($id);

        $dataUpdate = [
            'nama' => $request->nama,
            'username' => $request->username,
        ];

        if($request->password && $request->password_baru && $request->konfirmasi_password) {
            if(!Hash::check($request->password, $petugas->password)) {
                return redirect()->back()->withErrors(['password' => 'Password lama tidak cocok.']);
            }

            if($request->password_baru !== $request->konfirmasi_password) {
                return redirect()->back()->withErrors(['konfirmasi_password' => 'Konfirmasi password dan password baru tidak cocok.']);
            }

            $dataUpdate['password'] = Hash::make($request->password_baru);
        }

        $petugas->update($dataUpdate);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
