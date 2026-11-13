<!DOCTYPE html>
<html lang="en">

{{-- Bagian Head --}}
@include('kehadiran.partials.head')

<body>
    <div class="app">
        {{-- Sidebar --}}
        @include('kehadiran.components.sidebar')

        {{-- Main Content --}}
        @yield('content')
    </div>
</body>

</html>
