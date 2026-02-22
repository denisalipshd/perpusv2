@extends('layouts.anggota')

@section('title', 'Book Library | Peminjaman')

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
            <h1 class="text-center">Peminjaman Buku Saya</h1>
            <p class="text-center">Kembalikan buku yang telah dipinjam sesuai tanggal yang ditentukan jika tidak maka akan dikenakan denda.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Buku yang Dipinjam</h2>
        </div>
    </div>

    <div class="row">
        @forelse ($peminjamans as $peminjaman)
        <div class="col-md-4">  
            <div class="card mb-4 shadow-sm">
                <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}" 
                    class="card-img-top" 
                    alt="{{ $peminjaman->buku->judul }}"
                    style="height: 350px; object-fit: cover;">
                
                <div class="card-body">
                    <div class="mb-2 d-flex flex-wrap align-items-center gap-2">
                        <span class="badge text-bg-primary">Stok: {{ $peminjaman->buku->jumlah_buku }}</span>
                        <span class="badge text-bg-success">{{ $peminjaman->buku->pengarang }}</span>
                        <span class="badge text-bg-secondary">{{ $peminjaman->buku->tahun_terbit }}</span>
                    </div>
                    
                    <h5 class="card-title text-truncate">{{ $peminjaman->buku->judul }}</h5>
                    
                    <div class="d-flex flex-column mb-3 mt-2 small text-muted">
                        <span><strong>Tanggal Pinjam:</strong> {{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->format('d M Y') }}</span>
                        <span><strong>Batas Kembali:</strong> {{ \Carbon\Carbon::parse($peminjaman->tgl_kembali)->format('d M Y') }}</span>
                    </div>
                    
                    <button class="btn btn-primary w-100" 
                            data-bs-toggle="modal" 
                            data-bs-target="#kembaliModal{{ $peminjaman->id }}">
                        Kembalikan Buku
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="kembaliModal{{ $peminjaman->id }}" tabindex="-1" aria-labelledby="kembaliModal{{ $peminjaman->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="kembaliModal{{ $peminjaman->id }}Label">Formulir Pengembalian Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}" alt="" class="w-50 d-block mx-auto mb-3">
                        <h5 class="text-center mb-3">{{ $peminjaman->buku->judul }}</h5>
                        <p class="text-center mb-4">Apakah Anda yakin ingin mengembalikan buku ini?</p>
                        <form action="{{ route('anggota.pengembalian', $peminjaman->id) }}" method="POST">
                            <div>
                                <label for="petugas_id" class="form-label">Pilih Petugas</label>
                                <select class="form-control mb-3" name="petugas_id" id="petugas_id" aria-label="Default select example" required>
                                    <option selected>Pilih Petugas</option>
                                    @foreach ($petugas as $petugas)
                                        <option value="{{ $petugas->id }}">{{ $petugas->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">Kembalikan Buku</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="alert alert-info text-center">
                <h5>Belum ada buku yang dipinjam.</h5>
                <a href="{{ route('anggota.daftar-buku') }}" class="btn btn-sm btn-primary mt-2">Cari Buku</a>
            </div>
        </div>
        @endforelse
    </div>
@endsection