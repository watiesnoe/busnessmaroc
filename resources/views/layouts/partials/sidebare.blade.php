<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="{{ route('home.index') }}">
              <span class="smini-visible">
                D<span class="opacity-75">x</span>
              </span>
                <span class="smini-hidden">
                Dash<span class="opacity-75">mix</span>
              </span>
            </a>

            <!-- Options -->
            <div class="d-flex align-items-center gap-1">
                <!-- Dark Mode -->
                <div class="dropdown">
                    <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end smini-hide border-0">
                        <button class="dropdown-item" data-toggle="layout" data-action="dark_mode_off">
                            <i class="far fa-sun fa-fw opacity-50"></i> <span class="fs-sm fw-medium">Clair</span>
                        </button>
                        <button class="dropdown-item" data-toggle="layout" data-action="dark_mode_on">
                            <i class="far fa-moon fa-fw opacity-50"></i> <span class="fs-sm fw-medium">Sombre</span>
                        </button>
                        <button class="dropdown-item" data-toggle="layout" data-action="dark_mode_system">
                            <i class="fa fa-desktop fa-fw opacity-50"></i> <span class="fs-sm fw-medium">Système</span>
                        </button>
                    </div>
                </div>

                <!-- Thèmes -->
                <div class="dropdown">
                    <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-toggle="dropdown">
                        <i class="fa fa-fw fa-paint-brush"></i>
                    </button>
                    <!-- (liste des thèmes conservée ici, inchangée) -->
                </div>

                <!-- Mobile Close -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <!-- Dashboard -->
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('home.index') }}">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>

                <!-- Maison -->
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" href="#">
                        <i class="nav-main-link-icon fa fa-building"></i>
                        <span class="nav-main-link-name">Maison</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('immobiliers.index') }}">
                                <i class="nav-main-link-icon fa fa-city"></i>
                                <span class="nav-main-link-name">Immeubles</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('chambres.index') }}">
                                <i class="nav-main-link-icon fa fa-bed"></i>
                                <span class="nav-main-link-name">Chambres</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Offres -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('offre.index') }}">
                        <i class="nav-main-link-icon fa fa-bullhorn"></i>
                        <span class="nav-main-link-name">Offres</span>
                    </a>
                </li>

                <!-- Clients -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('utilisateurs.clients') }}">
                        <i class="nav-main-link-icon fa fa-user"></i>
                        <span class="nav-main-link-name">Clients</span>
                    </a>
                </li>

                <!-- Candidats -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('entreprises.index') }}">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Candidats</span>
                    </a>
                </li>

                <!-- Entreprises -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('entreprises.index') }}">
                        <i class="nav-main-link-icon fa fa-building-user"></i>
                        <span class="nav-main-link-name">Entreprises</span>
                    </a>
                </li>

                <!-- Configuration -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('utilisateurs.index') }}">
                        <i class="nav-main-link-icon fa fa-cogs"></i>
                        <span class="nav-main-link-name">Configuration</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
