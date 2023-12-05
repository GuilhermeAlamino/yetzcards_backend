<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            Painel | Admin
        </div>
        <div class="sidebar-brand-text mx-3" id="user-name"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') || request()->is('dashboard/sortear/store') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li
        class="nav-item {{ request()->is('dashboard/player/create') || request()->is('dashboard/player') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTask"
            aria-expanded="{{ request()->is('dashboard/player/create') || request()->is('dashboard/player') ? 'true' : 'false' }}"
            aria-controls="collapseTask">
            <i class="fas fa-futbol"></i>
            <span>Jogadores</span>
        </a>
        <div id="collapseTask"
            class="collapse {{ request()->is('dashboard/player/create') || request()->is('dashboard/player') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('dashboard/player/create') ? 'customized_hover' : '' }}"
                    href="/dashboard/player/create">Criar Jogadores</a>
                <a class="collapse-item {{ request()->is('dashboard/player') ? 'customized_hover' : '' }}"
                    href="/dashboard/player">Gerenciar Jogadores</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li
        class="nav-item {{ request()->is('dashboard/user/create') || request()->is('dashboard/user') || request()->is('dashboard/user/settings') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="{{ request()->is('dashboard/user/create') || request()->is('dashboard/user') || request()->is('dashboard/user/settings') ? 'true' : 'false' }}"
            aria-controls="collapseUser">
            <i class="fas fa-user-circle"></i>
            <span>Usúarios</span>
        </a>
        <div id="collapseUser"
            class="collapse {{ request()->is('dashboard/user/create') || request()->is('dashboard/user') || request()->is('dashboard/user/settings') ? 'show' : '' }}"
            aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('dashboard/user/create') ? 'customized_hover' : '' }}"
                    href="/dashboard/user/create">Criar Usúarios</a>
                <a class="collapse-item {{ request()->is('dashboard/user') ? 'customized_hover' : '' }}"
                    href="/dashboard/user">Gerenciar Usúarios</a>
                <a class="collapse-item {{ request()->is('dashboard/user/settings') ? 'customized_hover' : '' }}"
                    href="/dashboard/user/settings">Configurações</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
