<aside class="sidebar">
    <div class="brand">Manajemen Sekolah</div>
<a href="{{ route('guru.table') }}" class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}">Data Guru</a>
    <a href="{{ route('jadwal.table') }}" class="nav-link {{ request()->routeIs('jadwal.*') ? 'active' : '' }}">Jadwal Mengajar</a>

</aside>
