@extends('layouts.auth')

@section('title', 'Login Anggota')
@section('subtitle', 'Login Anggota')

@section('content')
    <form action="{{ route('anggota.prosses.login') }}" method="POST">
        @csrf
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
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        Belum punya akun? <a href="{{ route('anggota.register') }}">Register di sini</a>
    </div>
@endsection