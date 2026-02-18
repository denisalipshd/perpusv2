<div class="sidebar" id="sidebar">
      <div class="logo">Book Library</div>
      <ul>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="{{ request()->routeIs('buku.index') ? 'active' : '' }}"><a href="{{ route('buku.index') }}">Buku</a></li>
        <li><a href="#">Peminjaman</a></li>
        <li><a href="#">Pengembalian</a></li>
        <li><a href="#">Anggota</a></li>
        <li><a href="#">Petugas</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
</div>