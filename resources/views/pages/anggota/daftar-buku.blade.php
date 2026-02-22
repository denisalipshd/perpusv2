@extends('layouts.anggota')

@section('title', 'Book Library | Daftar Buku')

@section('content')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @endif
    
    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif

    <div class="row bg-light rounded-3 py-5 mb-5">
        <div class="col-md-12">
            <h1 class="text-center">Selamat Datang di Perpustakaan Digital</h1>
            <p class="text-center">Temukan berbagai buku yang bisa Anda pinjam secara online.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Daftar Buku</h2>
        </div>
    </div>
        <div class="row">
            @forelse ($bukus as $buku)
            <div class="col-md-4">
                <div class="card mb-4">
                <img src="{{ asset('storage/' . $buku->cover) }}" class="card-img-top" alt="{{ $buku->judul }}" style="height: 350px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2 d-flex align-items-center gap-2">
                            <span class="badge text-bg-primary">Stok: {{ $buku->jumlah_buku }}</span>
                            <span class="badge text-bg-success">{{ $buku->pengarang }}</span>
                            <span class="badge text-bg-secondary">{{ $buku->tahun_terbit }}</span>
                        </div>
                        <h5 class="card-title">{{ $buku->judul }}</h5>
                        @if ($anggota)
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#pinjamModal{{ $buku->id }}">Pinjam</button>
                        @else
                            <a href="{{ route('anggota.login') }}" onclick="return confirm('Silahkan login terlebih dahulu!')" class="btn btn-primary w-100">
                                Pinjam
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="pinjamModal{{ $buku->id }}" tabindex="-1" aria-labelledby="pinjamModal{{ $buku->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="pinjamModal{{ $buku->id }}Label">Formulir Peminjaman</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('anggota.pinjam', $buku->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" name="tgl_pinjam">
                                @error('tgl_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                                <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" name="tgl_kembali">
                                @error('tgl_kembali')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            @empty
               <div class="col-md-12">
                   <h5 class="text-center">Belum ada buku tersedia.</h5>
               </div>
            @endforelse
        </div>
@endsection