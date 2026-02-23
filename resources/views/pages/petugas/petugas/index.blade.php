@extends('layouts.petugas')

@section('title', 'Daftar Petugas')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Petugas</h4>
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah Petugas</a>
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
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petugas as $petugas)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $petugas->nama }}</td>
                <td>{{ $petugas->username }}</td>
                <td>
                    <a href="{{ route('petugas.edit', $petugas->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('petugas.destroy', $petugas->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus petugas ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
