    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                Lelang<span>Kan</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
            <li class="nav-item nav-category">Menu Utama</li>
            <li class="nav-item">
                <a href="admin" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Menu</li>

            {{-- Hak Akses Administrator --}}
            {{-- @if (Auth::guard('petugasG')->check() && Auth::guard('petugasG')->user()->levels->level == "administrator")
                @if (Auth::guard('petugasG')->user()->levels->level == "administrator")
                <li class="nav-item">
                    <a href="/pendataan-barang" class="nav-link">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    <span class="link-title">Pendataan Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/petugas" class="nav-link">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    <span class="link-title">Kelola Petugas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/laporan" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Generate Laporan</span>
                    </a>
                </li>
                @endif
            @endif --}}
            

            @if (Auth::guard('petugasG')->user()->level->level == "administrator")
                <li class="nav-item">
                <a href="/pendataan-barang" class="nav-link">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    <span class="link-title">Pendataan Barang</span>
                </a>
                </li>
                <li class="nav-item">
                <a href="/petugas" class="nav-link">
                    <i class="link-icon" data-feather="user-plus"></i>
                    <span class="link-title">Kelola Petugas</span>
                </a>
                </li>
                <li class="nav-item">
                <a href="/laporan" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Generate Laporan</span>
                </a>
                </li>
            @elseif (Auth::guard('petugasG')->user()->level->level == "petugas")
                <li class="nav-item">
                <a href="/aktivasi-barang" class="nav-link">
                    <i class="link-icon" data-feather="check-square"></i>
                    <span class="link-title">Aktivasi Barang</span>
                </a>
                </li>
            @endif
            
            {{-- Hak Akses Petugas --}}
            {{-- @if (Auth::guard('petugasG')->check() && Auth::guard('petugasG')->user()->levels->level == "petugas")
                @if (Auth::guard('petugasG')->user()->levels->level == "petugas")
                <li class="nav-item">
                    <a href="/aktivasi-barang" class="nav-link">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Aktivasi Barang</span>
                    </a>
                </li>
                @endif
            @endif --}}
            <li class="nav-item">
                <a href="/login" class="nav-link">
                <i class="link-icon" data-feather="log-out"></i>
                <span class="link-title">Logout</span>
                </a>
            </li>
            </ul>
        </div>
    </nav>