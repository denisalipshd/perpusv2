<div class="sidebar" id="sidebar">
    <div class="logo">Book Library</div>
    <ul>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ request()->routeIs('buku.*') ? 'active' : '' }}"> {{-- Gunakan asterik (*) agar sub-route seperti create/edit tetap aktif --}}
            <a href="{{ route('buku.index') }}">Buku</a>
        </li>
        <li class="{{ request()->routeIs('peminjaman.index') ? 'active' : '' }}">
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
        </li>
        <li><a href="#">Pengembalian</a></li>
        <li><a href="#">Anggota</a></li>
        <li><a href="#">Petugas</a></li>
        
        <li class="mt-auto"> {{-- Tambahkan mt-auto jika ingin logout berada agak ke bawah --}}
            <form id="logout-form" action="{{ route('petugas.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); if(confirm('Yakin Logout?')) document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    </ul>
</div>