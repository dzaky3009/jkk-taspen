<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="d-flex align-item-center justify-content-center" style="background-color : white">
        <img class="sidebar-brand-text mx-3 "alt="image" height="100" width="100" src="https://tos.taspen.co.id/assets/images/logotaspen.png">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('pelaporan') }}">
            <i class="fas fa-exclamation-triangle"></i>
            <span>Pelaporan</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="{{ route('claim') }}">
            <i class="fas fa-check"></i>
            <span>Claim</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="{{ route('proses') }}">
            <i class="fas fa-fw fa-spinner fa-spin"></i>
            <span>Dalam Proses</span>
        </a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link collapsed" href="{{ route('bms') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
            <span class="ml-1">Belum Mememnuhi Syarat</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="{{ route('ms') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
            <span class="ml=1">Memenuh Syarat</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>