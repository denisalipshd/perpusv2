@extends('layouts.petugas')

@section('title', 'Daftar Pengembalian')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Pengembalian</h4>
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
                <th scope="col">Judul Buku</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Denda</th>
                <th scope="col">Tgl Pengembalian</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengembalians as $pengembalian)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ asset('storage/' . $pengembalian->peminjaman->buku->cover) }}" alt="Cover Buku" width="50"></td>
                <td>{{ $pengembalian->peminjaman->buku->judul }}</td>
                <td>{{ $pengembalian->peminjaman->user->nama }}</td>
                <td>{{ $pengembalian->denda }}</td>
                <td>{{ $pengembalian->tgl_pengembalian }}</td>
                <td>
                    <a href="{{ route('pengembalian.show', $pengembalian->id) }}" class="btn btn-sm btn-success">Lihat</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data pengembalian.</td>
            </tr>
            @endforelse
        </tbody>
        </table>
    </div>
</div>
@endsection
