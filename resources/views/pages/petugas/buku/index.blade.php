@extends('layouts.petugas')

@section('title', 'Daftar Buku')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Buku</h4>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>

    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive-md">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
