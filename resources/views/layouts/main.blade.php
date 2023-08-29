<!DOCTYPE html>
<html lang="en">
<head>
  {{-- Header --}}
  @include('layouts.header')
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

  @include('layouts.script')

  @stack('script')
  {{-- @if (session()->has('success'))
  <script>
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
  @endif --}}
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
</body>
</html>
