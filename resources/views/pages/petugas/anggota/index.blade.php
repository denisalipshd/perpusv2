@extends('layouts.petugas')

@section('title', 'Daftar Anggota')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Anggota</h4>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
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
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggotas as $anggota)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $anggota->nama }}</td>
                <td>{{ $anggota->email }}</td>
                <td>{{ Str::limit($anggota->alamat, 30) }}</td>
                <td>{{ $anggota->no_telp }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('anggota.show', $anggota->id) }}" class="btn btn-sm btn-info">Lihat</a>
                    <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
