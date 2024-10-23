<header>
    <nav class="mt-2" style="background-color: #008080; min-height: 150vh;">
        <!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Beranda</p>
                </a>
            </li>
            <li class="nav-header text-white">MENU UTAMA</li>
            <li class="nav-item">
                <a href="{{ route('obat') }}" class="nav-link text-white">
                    <i class="nav-icon far fa-file-alt"></i>
                    <p>Data Obat</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('penjualan') }}" class="nav-link text-white">
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
</header>
