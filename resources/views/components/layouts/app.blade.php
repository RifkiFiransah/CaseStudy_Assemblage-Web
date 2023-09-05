<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? '' }} &mdash; Hima-TI</title>

    @if (Request::is('login') || Request::is('registrasi'))
    <link rel="shortcut icon" href="{{ asset('./img/hima/logo.png') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('./assets/modules/bootstrap-social/bootstrap-social.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.all.min.js"></script>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/components.css') }}">
    @else
    @include('components.layouts.header')
    @endif

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>

    <div id="app">
        @if (Request::is('login') || Request::is('registrasi'))
        {{ $slot }}
        @else
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
        @endif
    </div>

    @if (Request::is('login') || Request::is('registrasi'))
    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('./assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('./assets/js/scripts.js') }}"></script>
    <script src="{{ asset('./assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->

    @if (session()->has('success'))
    <script>
        swal.fire('Logout', `{{ session('success') }}`, 'success');
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        swal.fire('Failed', `{{ session('error') }}`, 'error');
    </script>
    @endif
    @else
    @include('components.layouts.script')
    @endif

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