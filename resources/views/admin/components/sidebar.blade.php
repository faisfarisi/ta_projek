<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Jember Coffe Centre</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="{{ asset('img/jcc.jpg') }}"
                    style="width: 70%; height: auto;"></a>

        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('/user-admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/user-admin') }}"><i class="fa-solid fa-users"></i>
                    <span>Users</span></a>
            </li>
            {{-- <li class="{{ Request::is('/member') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/member') }}"><i class="fas fa-user-shield"></i>
                    <span>Member</span></a>
            </li> --}}
            <li class="{{ Request::is('/produk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/produk') }}"><i class="fas fa-tag"></i>
                    <span>Kategori Kopi</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>Daftar Barang</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('/transaksi') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('admin/transaksi') }}">Barang Masuk</a>
                    </li>
                    <li class='{{ Request::is('/user-admin') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('admin/transaksi') }}">Barang Keluar</a>
                    </li>
                </ul>
            {{-- </li>
            <li class="nav-item dropdown {{ $type_menu === 'transaksi' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i><span>Transaksi
                        Offline</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('/transaksi') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi Masuk</a>
                    </li>
                    <li class='{{ Request::is('/transaksi') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi Diproses</a>
                    </li>
                    <li class='{{ Request::is('/transaksi') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi Selesai</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="{{ Request::is('/preorder') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/preorder') }}"><i class="fas fa-clipboard"></i>
                    <span>Preorder</span></a>
            </li> --}}
            {{-- <li class="{{ Request::is('/promosi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/promosi') }}"><i class="fas fa-paper-plane"></i>
                    <span>Promosi</span></a>
            </li> --}}
            {{-- <li class="{{ Request::is('/layanan-pelanggan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/layanan-pelanggan') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Layanan Pelanggan</span>
                </a>
            </li>
        </ul> --}}
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-print"></i><span>Cetak Laporan</span></a>
            <ul class="dropdown-menu">
                <li class='{{ Request::is('/laporan') ? 'active' : '' }}'>
                    <a class="nav-link" href="{{ url('admin/laporan') }}">Lap Barang masuk</a>
                </li>
                <li class='{{ Request::is('/user-admin') ? 'active' : '' }}'>
                    <a class="nav-link" href="{{ url('admin/laporan') }}">Lap Barang Keluar</a>
                </li>
                <li class='{{ Request::is('/user-admin') ? 'active' : '' }}'>
                    <a class="nav-link" href="{{ url('/laporan') }}">Lap Stok Barang</a>
                </li>

    </aside>
</div>
