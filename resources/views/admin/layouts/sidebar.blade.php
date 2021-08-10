<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}" data-item="_blank">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('admin/companies/*') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{ route('companies.index') }}">
                    <i class="nav-icon far fa-building {{-- i-Shop --}}"></i>
                    <span class="nav-text">Empresas</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('admin/coaches/*') ? 'active' : '' }} {{ request()->is('admin/athletes/*') ? 'active' : '' }}" data-item="users">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Conference"></i>
                    <span class="nav-text">Usuários</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('admin/plans/*') ? 'active' : '' }} {{ request()->is('admin/extensions/*') ? 'active' : '' }}" data-item="plans">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Billing"></i>
                    <span class="nav-text">Planos e Extensões</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{ request()->is('admin/logs/*') ? 'active' : '' }}">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Big-Data"></i>
                    <span class="nav-text">Logs</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Usuários -->
        <ul class="childNav" data-parent="users">
            <li class="nav-item ">
                <a class="" href="{{-- route('admin.admins') --}}">
                    <i class="nav-icon fas fa-user-secret {{-- i-Business-ManWoman --}}"></i>
                    <span class="item-name">Administradores</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="" href="{{-- route('admin.coaches') --}}">
                    <i class="nav-icon fas fa-user-tie {{-- i-Business-ManWoman --}}"></i>
                    <span class="item-name">Treinadores</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="" href="{{-- route('admin.athletes') --}}">
                    <i class="nav-icon fas fa-user {{-- i-MaleFemale --}}"></i>
                    <span class="item-name">Atletas</span>
                </a>
            </li>
            <li class="nav-item ">
            <a class="" href="{{-- route('admin.unlinked_users') --}}">
                    <i class="nav-icon fas fa-user-lock {{-- i-Lock-User --}}"></i>
                    <span class="item-name">Desvinculados</span>
                </a>
            </li>
        </ul>
        <!-- Submenu Planos e Extensões -->
        <ul class="childNav" data-parent="plans">
            <li class="nav-item">
                <a class="" href="{{ route('plans.index') }}">
                    <i class="nav-icon fas fa-file-invoice-dollar {{-- i-Billing --}}"></i>
                    <span class="nav-text">Planos</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item">
                <a class="" href="{{ route('extensions.index') }}">
                    <i class="nav-icon fas fa-puzzle-piece {{-- i-Financial --}}"></i>
                    <span class="nav-text">Extensões</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>

    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->