<!DOCTYPE html>
<html lang="en">

{{-- Bagian Head --}}
@include('guru.partials.head')

<body>
    <div class="app">
        {{-- Sidebar --}}
        @include('guru.components.sidebar')

        {{-- Main Content --}}
        @yield('content')
    </div>
</body>

</html>
