<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">HIMA-TI</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">TI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown {{ Request::is('home*') ? 'active' : '' }}">
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('dashboard*') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Master</li>
        <li class="nav-item dropdown {{ Request::is('pengurus*') ? 'active' : '' }}">
          <a href="{{ route('pengurus.index') }}" class="nav-link"><i class="fas fa-users"></i>
          <span>Pengurus</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('divisi*') ? 'active' : '' }}">
          <a href="{{ route('divisi.index') }}" class="nav-link"><i class="fas fa-school"></i> <span>Divisi</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('proker*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('proker.index') }}"><i class="fas fa-book-open"></i>
          <span>Proker</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('seksi-seksi*') ? 'active' : '' }}">
          <a href="{{ route('seksi-seksi.index') }}" class="nav-link"><i class="fas fa-list"></i>
            <span>Seksi-seksi</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('kepanitiaan*') ? 'active' : '' }}">
          <a href="{{ route('kepanitiaan.index') }}" class="nav-link"><i class="fas fa-book-reader"></i>
            <span>Kepanitiaan</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('aktivitas*') ? 'active' : '' }}">
          <a href="{{ route('aktivitas') }}" class="nav-link"><i class="fas fa-pencil-ruler"></i>
            <span>Aktivitas</span></a>
        </li>
        <li class="menu-header">Personal</li>
        <li class="nav-item dropdown {{ Request::is('profile*') ? 'active' : '' }}">
          <a href="{{ route('profil.index') }}" class="nav-link"><i class="far fa-user"></i>
          <span>Profile</span></a>
        </li>
        <li class="nav-item dropdown">
          <form action="{{ route('logout') }}" method="post" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item text-danger border-0">
              <i class="fas fa-sign-out-alt ml-1 mr-3"></i> Logout
            </button>
          </form>
        </li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
  </aside>
</div>