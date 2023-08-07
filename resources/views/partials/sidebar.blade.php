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
        <li class="nav-item dropdown {{ Request::is('divisi*') ? 'active' : '' }}">
          <a href="{{ route('divisi.index') }}" class="nav-link"><i class="fas fa-school"></i> <span>Divisi</span></a>
        </li>
        <li>
          <a class="nav-link" href="blank.html"><i class="fas fa-book-open"></i>
          <span>Proker</span></a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link"><i class="fas fa-list"></i>
              <span>Seksi-seksi</span></a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link"><i class="fas fa-pencil-ruler"></i>
            <span>Aktivitas</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::is('pengurus*') ? 'active' : '' }}">
          <a href="{{ route('pengurus.index') }}" class="nav-link"><i class="fas fa-users"></i>
          <span>Pengurus</span></a>
        </li>
        <li class="menu-header">Personal</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link"><i class="far fa-user"></i>
          <span>Profile</span></a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
  </aside>
</div>