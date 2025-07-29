<!-- Bootstrap + Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="{{ asset('asset/imgs/template/loading.gif') }}" alt="jobBox"></div>
        </div>
    </div>
</div>

<style>
    /* Agrandir la taille du header */
    header.sticky-top {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    /* Style nav desktop */
    nav.d-lg-flex a.nav-link {
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0.5rem 1rem;
        transition: color 0.3s, background-color 0.3s;
    }

    nav.d-lg-flex a.nav-link:hover {
        color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
        border-radius: 0.3rem;
    }

    /* Menu mobile offcanvas */
    .offcanvas-body {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .offcanvas-body ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .offcanvas-body ul li a {
        display: block;
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
        color: #212529;
        text-decoration: none;
        border-radius: 0.3rem;
        transition: background-color 0.3s;
    }

    .offcanvas-body ul li a:hover {
        background-color: #e9ecef;
    }

    .offcanvas-body .btn {
        font-size: 1.1rem;
        padding: 0.5rem 0;
    }
</style>

<header class="shadow-sm sticky-top bg-white border-bottom">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <a href="{{ route('home.index') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <img src="{{ asset('assets/imgs/template/jobhub-logo.svg') }}" alt="Logo" height="40">
            </a>

            <!-- Menu navigation desktop -->
            <nav class="d-none d-lg-flex gap-3">
                <a href="{{ url('/') }}"
                   class="nav-link {{ request()->routeIs('home.index') || request()->is('/') ? 'text-primary fw-bold' : 'text-dark' }}">Accueil</a>
                <a href="{{ route('location') }}"
                   class="nav-link {{ request()->routeIs('location') ? 'text-primary fw-bold' : 'text-dark' }}">Location</a>
                <a href="{{ route('offres') }}"
                   class="nav-link {{ request()->is('offres') ? 'text-primary fw-bold' : 'text-dark' }}">Offres</a>
                <a href="{{ url('jobs-grid.html') }}"
                   class="nav-link {{ request()->is('jobs-grid.html') ? 'text-primary fw-bold' : 'text-dark' }}">Actualités</a>
            </nav>

            <!-- Actions utilisateur -->
            <div class="d-flex align-items-center gap-3">
                <div class="block-signin"><a class="text-link-bd-btom hover-up" href="page-register.html">Register</a>
                    @if (Auth::check())
                        <a class="btn btn-sm btn-shadow ml-10 hover-up btn-primary" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deconnexion</a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="btn btn-sm btn-shadow ml-10 hover-up btn-primary"
                           href="{{ route('home.index') }}">Connexion</a>
                    @endif


                </div>

                <!-- Burger menu mobile -->
                <button class="btn d-lg-none border-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Toggle menu">
                    <i class="bi bi-list fs-3 text-dark"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!-- Menu mobile -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ route('location') }}">Location</a></li>
            <li><a href="{{ route('offres') }}">Offres</a></li>
            <li><a href="{{ url('jobs-grid.html') }}">Actualités</a></li>
        </ul>
        <hr>

        {{-- <a href="{{ route('home.index') }}" class="btn btn-primary w-100">Se connecter</a> --}}
        <div class="block-signin">
            <a href="{{ url('page-register.html') }}" class="btn btn-outline-primary w-100 mb-2">S'inscrire</a>
            @if (Auth::check())
                <a class="btn btn-sm btn-shadow  hover-up w-100 mb-2 btn-primary" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deconnexion</a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none">
                    {{ csrf_field() }}
                </form>
            @else
                <a class="btn btn-sm btn-shadow  hover-up w-100 mb-2 btn-primary"
                   href="{{ route('home.index') }}">Connexion</a>
            @endif


        </div>
    </div>
</div>
