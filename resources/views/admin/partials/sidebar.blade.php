<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('admin/assets/img/logo.png') }}" alt="navbar brand" class="mt-4 navbar-brand"
                    height="70" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                @if (auth()->user()->id_level == 2)
                    <li class="nav-item {{ Request::is('peserta') ? 'active' : '' }}">
                        <a href="{{ route('peserta.index') }}">
                            <i class="bi bi-people-fill"></i>
                            <p>Peserta</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->id_level == 1)
                    <li class="nav-item {{ Request::is('peserta') ? 'active' : '' }}">
                        <a href="{{ route('peserta.index') }}">
                            <i class="bi bi-people-fill"></i>
                            <p>Peserta</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('role') ? 'active' : '' }}">
                        <a href="{{ route('role.index') }}">
                            <i class="bi bi-bar-chart-steps"></i>
                            <p>Role</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('gelombang') ? 'active' : '' }}">
                        <a href="{{ route('gelombang.index') }}">
                            <i class="bi bi-soundwave"></i>
                            <p>Gelombang</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('jurusan') ? 'active' : '' }}">
                        <a href="{{ route('jurusan.index') }}">
                            <i class="bi bi-hammer"></i>
                            <p>Jurusan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
