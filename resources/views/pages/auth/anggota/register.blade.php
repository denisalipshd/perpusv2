@extends('layouts.auth')

@section('title', 'Register Anggota')
@section('subtitle', 'Register Anggota')

@section('content')
    <form action="{{ route('anggota.prosses.register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
            @error('nama')
                <p class="invalid-feedback text-sm text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
            @error('email')
                <p class="invalid-feedback text-sm text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <p class="invalid-feedback text-sm text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp">
            @error('no_telp')
                <p class="invalid-feedback text-sm text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"></textarea>
            {{-- <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"> --}}
            @error('alamat')
                <p class="invalid-feedback text-sm text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>

    <div class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('anggota.login') }}">Login di sini</a>
    </div>
@endsection