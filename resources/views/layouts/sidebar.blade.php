<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard')? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ ($activeMenu == 'level')? 'active' : '' }}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user')? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a>
            </li>
            <!-- Menu Update Profile -->
            <li class="nav-item">
                <a href="{{ url('/profile') }}" class="nav-link {{ ($activeMenu == 'profile')? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-edit"></i>
                    <p>Update Profile</p>
                </a>
            </li>
            <li class="nav-header">Data Barang</li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori')? 'active' : '' }}">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Kategori Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 'barang')? 'active' : '' }}">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-header">Data Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ ($activeMenu == 'stok')? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Stok Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{ ($activeMenu == 'penjualan')? 'active' : '' }}">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Transaksi Penjualan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/detail') }}" class="nav-link {{ ($activeMenu == 'detailpenjualan')? 'active' : '' }}">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Detail Penjualan</p>
                </a>
            </li>
            <li class="nav-header">Data Supplier</li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{ ($activeMenu == 'supplier')? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data Supplier</p>
                </a>
            </li>
            <!-- Menu Logout -->
            <li class="nav-header">Log Out</li>
            <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
<style>
.sidebar {
    background-color: #01153E; /* Warna navy untuk background sidebar */
    padding: 10px;
    color: #FAF3E0; /* Warna cream untuk teks */
}

.nav-sidebar .nav-link {
    color: #FAF3E0; /* Warna cream untuk teks */
}

.nav-sidebar .nav-link:hover {
    background-color: #563C5C; /* Warna coklat untuk hover pada menu */
    color: #FF9673; /* Warna coklat lebih terang */
}

.nav-sidebar .nav-link.active {
    background-color: #FF9673; /* Warna coklat terang untuk menu yang aktif */
    color: #01153E; /* Warna navy untuk teks menu yang aktif */
}

.nav-header {
    color: #FF9673; /* Warna coklat terang untuk header menu */
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 5px;
}

.form-control-sidebar {
    background-color: #FAF3E0; /* Warna cream untuk kotak pencarian */
    border: 1px solid #563C5C; /* Border warna coklat */
    color: #01153E; /* Warna navy untuk teks pencarian */
}

.form-control-sidebar::placeholder {
    color: #563C5C; /* Placeholder dengan warna coklat */
}

.btn-sidebar {
    background-color: #FF9673; /* Tombol pencarian warna coklat terang */
    border: none;
    color: #01153E; /* Ikon pencarian warna navy */
}

.nav-icon {
    color: #FF9673; /* Warna coklat terang untuk ikon */
}

.nav-icon:hover {
    color: #FAF3E0; /* Warna cream saat hover ikon */
}


</style>