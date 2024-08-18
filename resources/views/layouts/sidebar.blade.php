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
            <i class="fas fa-fw fa-cog"></i>
            <span>Claim</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="/proses">
            <i class="fas fa-fw fa-spinner fa-spin"></i>
            <span>Proses</span>
        </a>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link collapsed" href="/bms">
            <i class="fas fa-fw fa-times"></i>
            <span>BMS</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="/ms">
            <i class="fas fa-fw fa-check"></i> 
            <span>MS</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>