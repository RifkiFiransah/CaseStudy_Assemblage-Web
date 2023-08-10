<!DOCTYPE html>
<html lang="en">
<head>
  {{-- Header --}}
  {{-- @include('layouts.header') --}}
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} Hima-TI</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('./assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/modules/weathericons/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/modules/weathericons/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/modules/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('./assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('./assets/modules/fullcalendar/dist/fullcalendar.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('./assets/css/components.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.21/dist/sweetalert2.all.min.js"></script>
  <style>
    .colored-toast.swal2-icon-success {
      background-color: #a5dc86 !important;
    }
    .colored-toast .swal2-title {
      color: white;
    }

    .colored-toast .swal2-close {
      color: white;
    }

    .colored-toast .swal2-html-container {
      color: white;
    }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      {{-- Navbar --}}
      @include('partials.navbar')
      
      {{-- Sidebar --}}
      @include('partials.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      
      {{-- Footer --}}
      @include('partials.footer')
    </div>
  </div>

  {{-- Script --}}
  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('./assets/js/stisla.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('./assets/modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/chart.js/dist/Chart.min.j') }}s"></script>
  <script src="{{ asset('./assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('./assets/modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('./assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/prismjs/prism.js') }}"></script>
  <script src="{{ asset('./assets/modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('./assets/modules/chart.js/dist/Chart.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('./assets/js/scripts.js') }}"></script>
  <script src="{{ asset('./assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('./assets/js/page/bootstrap-modal.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('./assets/js/page/modules-datatables.js') }}"></script>
  {{-- <script src="{{ asset('./assets/js/page/modules-chartjs.js') }}"></script> --}}

    {{-- @include('layouts.script') --}}

  @stack('script')
  @if (session()->has('success'))
  <script>
    // swal('Berhasil', `{{ session('success') }}`, 'success');
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast'
      },
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true
    })
    Toast.fire({
      icon: 'success',
      title: '{{ session('success') }}'
    })
  </script>
  @endif
</body>
</html>
