<div class="sidebar" id="sidebar">
    <div class="logo">Book Library</div>
    <ul>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">
            <a href="{{ route('buku.index') }}">Buku</a>
        </li>
        <li class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
            <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
        </li>
        <li class="{{ request()->routeIs('pengembalian.*') ? 'active' : '' }}">
            <a href="{{ route('pengembalian.index') }}">Pengembalian</a>
        </li>
        <li class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}">
            <a href="{{ route('anggota.index') }}">Anggota</a>
        </li>
        <li class="{{ request()->routeIs('petugas.*') ? 'active' : '' }}">
            <a href="{{ route('petugas.index') }}">Petugas</a>
        </li>
        
        <li class="mt-auto">
            <form id="logout-form" action="{{ route('petugas.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); if(confirm('Yakin Logout?')) document.getElementById('logout-form').submit();">
                Logout
            </a>
        </li>
    </ul>
</div>