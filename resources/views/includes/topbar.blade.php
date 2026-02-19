@php
 $petugas = Auth::guard('petugas')->user();
@endphp

<div class="topbar">
      <button id="menu-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
      <h4>Dashboard</h4>
      <div class="profile">{{ $petugas->nama }}</div>
</div>