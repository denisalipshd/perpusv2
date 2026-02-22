@extends('layouts.petugas')

@section('title', 'Daftar Pengembalian')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Pengembalian</h4>
        {{-- <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a> --}}
    </div>

    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive-md">
        <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Cover Buku</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">tgl Pinjam</th>
                <th scope="col">Tgl Kembali</th>
                <th scope="col">No. Telp</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjamans as $peminjaman)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ asset('storage/' . $peminjaman->buku->cover) }}" alt="Cover Buku" width="50"></td>
                <td>{{ $peminjaman->user->nama }}</td>
                <td>{{ $peminjaman->buku->judul }}</td>
                <td>{{ $peminjaman->tgl_pinjam }}</td>
                <td>{{ $peminjaman->tgl_kembali }}</td>
                <td>{{ $peminjaman->user->no_telp }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data peminjaman.</td>
            </tr>
            @endforelse
        </tbody>
        </table>
    </div>
</div>
@endsection
