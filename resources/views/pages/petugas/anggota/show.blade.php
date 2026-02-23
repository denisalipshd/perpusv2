@extends('layouts.petugas')

@section('title', 'Detail Anggota')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail Anggota</h4>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="card mb-3 shadow-sm p-3">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 class="card-title">{{ $anggota->nama }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $anggota->email }}</p>
                    <p class="card-text"><strong>No. Telp:</strong> {{ $anggota->no_telp }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $anggota->alamat }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
