@extends('layouts.petugas')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail Peminjaman</h4>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="card mb-3 shadow-sm p-3">
        <div class="row g-0">
            <div class="col-md-4 mb-3">
                <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}" class="img-fluid rounded-start" alt="{{ $peminjaman->buku->judul }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $peminjaman->buku->judul }}</h5>
                    <p class="card-text"><strong>Nama Anggota:</strong> {{ $peminjaman->user->nama }}</p>
                    <p class="card-text"><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tgl_pinjam }}</p>
                    <p class="card-text"><strong>Tanggal Kembali:</strong> {{ $peminjaman->tgl_kembali }}</p>
                    <p class="card-text"><strong>No. Telp:</strong> {{ $peminjaman->user->no_telp }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $peminjaman->user->alamat }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
