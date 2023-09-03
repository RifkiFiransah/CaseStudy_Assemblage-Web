<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('/img/hima/logo.png') }}" class="img-fluid shadow-light" width="50">
            <a href="index.html">HIMA-TI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <x-nav-link :active="Request()->is('home')" href="{{ route('home') }}" :icon="'fas fa-home'">
                Home
            </x-nav-link>
            <x-nav-link :active="Request()->is('dashboard')" href="{{ route('dashboard') }}" :icon="'fas fa-fire'">
                Dashboard
            </x-nav-link>

            <li class="menu-header">Master</li>
            <x-nav-link :active="Request()->is('pengurus*')" href="{{ route('pengurus.index') }}" :icon="'fas fa-users'">
                Pengurus
            </x-nav-link>
            <x-nav-link :active="Request()->is('divisi*')" href="{{ route('divisi.index') }}" :icon="'fas fa-school'">
                Divisi
            </x-nav-link>
            <x-nav-link :active="Request()->is('proker*')" href="{{ route('proker.index') }}" :icon="'fas fa-book-open'">
                Proker
            </x-nav-link>
            <x-nav-link :active="Request()->is('seksi-seksi*')" href="{{ route('section.index') }}" :icon="'fas fa-list'">
                Seksi-seksi
            </x-nav-link>
            <x-nav-link :active="Request()->is('kepanitiaan*')" href="{{ route('kepanitiaan.index') }}" :icon="'fas fa-book-reader'">
                Kepanitiaan
            </x-nav-link>
            <x-nav-link :active="Request()->is('aktivitas*')" href="{{ route('aktivitas') }}" :icon="'fas fa-pencil-ruler'">
                aktivitas
            </x-nav-link>

            <li class="menu-header">Personal</li>
            <x-nav-link :active="Request()->is('profil*')" href="{{ route('profil.index') }}" :icon="'fas fa-user'">
                Profil
            </x-nav-link>

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
