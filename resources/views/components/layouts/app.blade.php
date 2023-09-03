<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }} &mdash; Hima-TI</title>

    @include('components.layouts.header')

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            {{-- Navbar --}}
            @include('components.partials.navbar')

            {{-- Sidebar --}}
            @include('components.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                {{-- @yield('content') --}}
                {{ $slot }}
            </div>

            {{-- Footer --}}
            @include('components.partials.footer')
        </div>
    </div>


    @include('components.layouts.script')
    @stack('script')

    @if (session()->has('success'))
        <script>
            swal({
                title: 'Berhasil',
                text: `{{ session('success') }}`,
                icon: 'success',
                dangerMode: true
            }).then((oke) => {
                iziToast.success({
                    title: 'Success!',
                    message: '{{ session('success') }}',
                    position: 'topRight'
                });
            })
        </script>
    @endif
    @if (flash()->message)
        <script>
            swal({
                title: 'Berhasil',
                text: `{{ flash()->message }}`,
                icon: 'success',
                dangerMode: true
            }).then((oke) => {
                iziToast.success({
                    title: 'Success!',
                    message: '{{ flash()->message }}',
                    position: 'topRight'
                });
            })
        </script>
    @endif
</body>

</html>
