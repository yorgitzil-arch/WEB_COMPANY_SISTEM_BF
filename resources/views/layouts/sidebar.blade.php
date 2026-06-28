<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Bitforge</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->email }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @php
                    $role = Auth::user()->peran ?? 'guest';
                    $currentRoute = request()->route()->getName();
                @endphp

                @if($role == 'admin')
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ $currentRoute == 'admin.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">MANAJEMEN</li>

                    <li class="nav-item">
                        <a href="{{ route('manage-admin.index') }}" class="nav-link">
                            <i class="fa fa-user-shield"></i> Kelola Akun
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('crud_anggota.index') }}"
                            class="nav-link {{ request()->routeIs('crud_anggota.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Kelola Anggota</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('crud_departemen.index') }}"
                            class="nav-link {{ request()->routeIs('crud_departemen.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Kelola Departemen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Konten Publik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-check-double"></i>
                            <p>Validasi</p>
                        </a>
                    </li>

                    <li class="nav-header">SETTINGS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>

                @elseif($role == 'anggota')
                    <li class="nav-item">
                        <a href="{{ route('anggota.dashboard') }}"
                            class="nav-link {{ $currentRoute == 'anggota.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">PORTOFOLIO</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>Proyek Saya</p>
                        </a>
                    </li>

                @elseif($role == 'departemen')
                    <li class="nav-item">
                        <a href="{{ route('departemen.dashboard') }}"
                            class="nav-link {{ $currentRoute == 'departemen.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">LAYANAN</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Profile Dept</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Layanan</p>
                        </a>
                    </li>

                @elseif($role == 'keuangan')
                    <li class="nav-item">
                        <a href="{{ route('keuangan.dashboard') }}"
                            class="nav-link {{ $currentRoute == 'keuangan.dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">TRANSAKSI</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>Pemasukan</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>