@extends('layouts.anggota')

@section('title', 'Book Library | Beranda')

@section('content')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
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
            <h2 class="mb-4">Buku Terbaru</h2>
        </div>
        <div class="row">
            @forelse ($bukus as $buku)
            <div class="col-md-4">
                <div class="card mb-4">
                <img src="{{ asset('storage/' . $buku->cover) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="mb-2 d-flex align-items-center gap-2">
                            <span class="badge text-bg-primary">Stok: {{ $buku->jumlah_buku }}</span>
                            <span class="badge text-bg-success">{{ $buku->pengarang }}</span>
                            <span class="badge text-bg-secondary">{{ $buku->tahun_terbit }}</span>
                        </div>
                        <h5 class="card-title">{{ $buku->judul }}</h5>
                        @if ($anggota)
                            <a href="#" class="btn btn-primary w-100">Pinjam</a>
                        @else
                            <a href="{{ route('anggota.login') }}" onclick="return confirm('Silahkan login terlebih dahulu!')" class="btn btn-primary w-100">
                                Pinjam
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
               <div class="col-md-12">
                   <h5 class="text-center">Belum ada buku tersedia.</h5>
               </div>
            @endforelse
        </div>
    </div>
@endsection