<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function register()
    {
        return view('pages.auth.anggota.register');
    }

    public function login()
    {
        return view('pages.auth.anggota.login');
    }

    public function prossesRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
        ]);

        // Simpan data petugas ke database
        $anggota = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        Auth::login($anggota);

        return redirect()->route('beranda')->with('success', 'Registrasi berhasil.');
    }

    public function prossesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('beranda'))->with('success', 'Login berhasil.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda')->with('success', 'Logout berhasil.');
    }
}
