<!DOCTYPE html>
<html lang="en">

{{-- Bagian Head --}}
@include('jadwal.partials.head')

<body>
    <div class="app">
        {{-- Sidebar --}}
        @include('jadwal.components.sidebar')

        {{-- Main Content --}}
        @yield('content')
    </div>
</body>

</html>
