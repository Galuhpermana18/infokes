<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        {{-- <p>{{ request()->route()->getName() }}</p> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard')?'active':'' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    {{-- Untuk Sidebar Admin --}}
    @if (auth()->user()->role == 'admin')

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->is('dashboard/pasien*')) || (request()->is('dashboard/dokter*')) || (request()->is('dashboard/obat*')) || (request()->is('dashboard/ruangan*')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('dashboard/pasien*')) || (request()->is('dashboard/dokter*')) || (request()->is('dashboard/obat*')) || (request()->is('dashboard/ruangan*')) ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse {{ (request()->is('dashboard/pasien*')) || (request()->is('dashboard/dokter*')) || (request()->is('dashboard/obat*')) || (request()->is('dashboard/ruangan*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data :</h6>
                <a class="collapse-item" href="buttons.html">Pasien</a>
                <a class="collapse-item" href="cards.html">Dokter</a>
                <a class="collapse-item {{ (request()->is('dashboard/ruangan*')) ? 'active' : '' }}" href="{{ route('ruangan.index') }}">Ruangan</a>
                <a class="collapse-item {{ (request()->is('dashboard/obat*')) ? 'active' : '' }}" href="{{route('obat.index')}}">Obat</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Rekam Medis</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif

    {{-- Untuk Sidebar Pasien --}}
    @if (auth()->user()->role == 'pasien')
    <!-- Heading -->
    <div class="sidebar-heading">
        Rekaman Medis
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            {{-- <i class="fas fa-fw fa-chart-area"></i> --}}
            <i class="fas fa-bed    "></i>
            <span>Rekaman Medis Saya</span></a>
    </li>
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>