@extends('layouts.auth')

@section('title', 'Login Petugas')
@section('subtitle', 'Login Petugas')

@section('content')
    <form action="{{ route('petugas.prosses.login') }}" method="POST">
        @csrf
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
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        Belum punya akun? <a href="{{ route('petugas.register') }}">Register di sini</a>
    </div>
@endsection