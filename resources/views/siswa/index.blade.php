<!DOCTYPE html>
<html lang="en">

{{-- Bagian Head --}}
@include('siswa.partials.head')

<body>
    <div class="app">
        {{-- Sidebar --}}
        @include('siswa.components.sidebar')

        {{-- Main Content --}}
        @yield('content')
    </div>
</body>

</html>
