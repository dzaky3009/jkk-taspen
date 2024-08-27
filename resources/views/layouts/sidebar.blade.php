<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="d-flex align-item-center justify-content-center" style="background-color : white">
        <img class="sidebar-brand-text mx-3 "alt="image" height="100" width="100" src="https://tos.taspen.co.id/assets/images/logotaspen.png">
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active bg-warning' : ''  }}">
        <a class="nav-link waves-effect" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ request()->is('pelaporan') ? 'active bg-warning' : ''  }}">
        <a class="nav-link" href="{{ route('pelaporan') }}">
            <i class="fas fa-exclamation-triangle"></i>
            <span>Pelaporan</span></a>
    </li>

    <li class="nav-item {{ request()->is('claim') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('claim') }}">
            <i class="fas fa-check"></i>
            <span>Claim</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('proses') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('proses') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
              </svg>
            <span class="ml-1">Dalam Proses</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('ms') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('ms') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
            <span class="ml=1">Memenuh Syarat</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('bms') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('bms') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
            <span class="ml-1">Belum Memenuhi Syarat</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('tms') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('tms') }}">
            <i class="fas fa-times"></i>
            <span class="ml-1">Tidak Memenuhi Syarat</span>
        </a>
    </li>
    

    @if(auth()->user()->role === 'admin')
    <li class="nav-item {{ request()->is('register') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('register') }}">
            <i class="fas fa-pencil-alt"></i>
            <span class="ml=1">Buat Akun</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('detail') ? 'active bg-warning' : ''  }}">
        <a class="nav-link collapsed" href="{{ route('detail') }}">
            <i class="fas fa-cog"></i>
            <span class="ml=1">Informasi Akun</span>
        </a>
    </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>