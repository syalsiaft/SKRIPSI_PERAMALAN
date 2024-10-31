<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #008080;">
    <a href="/dashboard" class="brand-link" style="background-color: white">
        <img src="{{ asset('dist/img/logo.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PADIPULSE</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <!-- Sidebar Menu -->
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link text-white" style="{{ Request::is('dashboard*') ? 'background-color: rgba(0, 0, 0, .1)' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-header text-white">MENU UTAMA</li>
                <li class="nav-item">
                    <a href="{{ route('obat.index') }}" class="nav-link text-white" style="{{ Request::is('obat*') ? 'background-color: rgba(0, 0, 0, .1)' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Data Obat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}" class="nav-link text-white" style="{{ Request::is('penjualan*') ? 'background-color: rgba(0, 0, 0, .1)' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>Data Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link text-white">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
