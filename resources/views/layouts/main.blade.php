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
</body>
</html>
