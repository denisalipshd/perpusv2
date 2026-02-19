<div class="sidebar" id="sidebar">
      <div class="logo">Book Library</div>
      <ul>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="{{ request()->routeIs('buku.index') ? 'active' : '' }}"><a href="{{ route('buku.index') }}">Buku</a></li>
        <li><a href="#">Peminjaman</a></li>
        <li><a href="#">Pengembalian</a></li>
        <li><a href="#">Anggota</a></li>
        <li><a href="#">Petugas</a></li>
        <form action="{{ route('petugas.logout') }}" method="POST">
          @csrf
          <li>
            <button type="submit" class="border-0 bg-transparent text-white" onclick="return confirm('Yakin Logout?')">Logout</button>
          </li>
        </form>
      </ul>
</div>