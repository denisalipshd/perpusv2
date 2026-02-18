@extends('layouts.petugas')

@section('title', 'Edit Buku')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Edit Buku</h4>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required value="{{ $buku->judul }}" >
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" required value="{{ $buku->pengarang  }}" >
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required value="{{ $buku->tahun_terbit }}" >
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
