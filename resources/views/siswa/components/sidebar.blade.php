<aside class="sidebar">
    <div class="brand">Manajemen Sekolah</div>
<a href="{{ route('siswa.table') }}" class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}">Data Siswa</a>
<a href="{{ route('kehadiran.table') }}" class="nav-link {{ request()->routeIs('kehadiran.*') ? 'active' : '' }}">Kehadiran</a>
</aside>
