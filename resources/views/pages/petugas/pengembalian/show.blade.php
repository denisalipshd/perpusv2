@extends('layouts.petugas')

@section('title', 'Detail Pengembalian')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Detail Pengembalian</h4>
        <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="card mb-3 shadow-sm p-3">
        <div class="row g-0">
            <div class="col-md-4 mb-3">
                <img src="{{ asset('storage/' . $pengembalian->peminjaman->buku->cover) }}" class="img-fluid rounded-start" alt="{{ $pengembalian->peminjaman->buku->judul }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $pengembalian->peminjaman->buku->judul }}</h5>
                    <p class="card-text"><strong>Nama Anggota:</strong> {{ $pengembalian->peminjaman->user->nama }}</p>
                    <p class="card-text"><strong>Petugas:</strong> {{ $pengembalian->petugas->nama }}</p>
                    <p class="card-text"><strong>Tanggal Pinjam:</strong> {{ $pengembalian->peminjaman->tgl_pinjam }}</p>
                    <p class="card-text"><strong>Tanggal Kembali:</strong> {{ $pengembalian->peminjaman->tgl_kembali }}</p>
                    <p class="card-text"><strong>Tanggal Pengembalian:</strong> {{ $pengembalian->tgl_pengembalian }}</p>
                    <p class="card-text"><strong>Denda:</strong> {{ $pengembalian->denda }}</p>
                    <p class="card-text"><strong>No. Telp:</strong> {{ $pengembalian->peminjaman->user->no_telp }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $pengembalian->peminjaman->user->alamat }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
