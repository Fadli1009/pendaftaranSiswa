<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
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
                <li class="nav-item">
                    <a href="../../documentation/index.html">
                        <i class="fas fa-file"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#roles">
                        <i class="fas fa-layer-group"></i>
                        <p>Roles</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="roles">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('role.index') }}">
                                    <span class="sub-item">Data Roles</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#gelombang">
                        <i class="fas fa-layer-group"></i>
                        <p>Gelombang</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="gelombang">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('gelombang.index') }}">
                                    <span class="sub-item">Data Gelombang</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#jurusan">
                        <i class="fas fa-layer-group"></i>
                        <p>Jurusan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="jurusan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('jurusan.index') }}">
                                    <span class="sub-item">Data Jurusan</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#users">
                        <i class="fas fa-layer-group"></i>
                        <p>Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <span class="sub-item">Data Users</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#peserta">
                        <i class="fas fa-layer-group"></i>
                        <p>Peserta</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="peserta">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('peserta.index') }}">
                                    <span class="sub-item">Data Peserta</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
