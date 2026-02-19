@extends('layouts.auth')

@section('title', 'Register Petugas')
@section('subtitle', 'Register Petugas')

@section('content')
    <form action="{{ route('petugas.prosses.register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
            @error('nama')
                <p class="invalid-feedback text-sm text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
            @error('username')
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
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>

    <div class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('petugas.login') }}">Login di sini</a>
    </div>
@endsection