{{--<!-- Bootstrap + Icons -->--}}
<link href="{{ asset('temp_assets/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('temp_assets/bootstrap-icons.css') }}" rel="stylesheet">
<script src="{{ asset('temp_assets/bootstrap.bundle.min.js') }}"></script>

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
                <img src="{{ asset('asset/imgs/logo.jpeg') }}" alt="Logo" height="40">
            </a>

            <!-- Menu navigation desktop -->
            <nav class="d-none d-lg-flex gap-3">
                <a href="{{ url('/') }}"
                    class="nav-link {{ request()->routeIs('home.index') || request()->is('/') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Accueil</a>
                <a href="{{ route('location') }}"
                    class="nav-link {{ request()->routeIs('location') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Location</a>
                <a href="{{ route('offres') }}"
                    class="nav-link {{ request()->is('offres') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Offres</a>
                <a href="{{ url('actualite') }}"
                    class="nav-link {{ request()->is('actualite') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Actualités</a>
                <a href="{{ url('universite') }}"
                    class="nav-link {{ request()->is('universite') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Universités</a>
            </nav>

            <!-- Actions utilisateur -->

            <div class="d-flex align-items-center gap-3">
                <div class="block-signin d-none d-lg-flex">
                    <!-- Bouton "S'inscrire" -->
                    @if (!Auth::check())
                        <a class="btn btn-sm btn-shadow hover-up me-2" href="{{ route('register.client') }}"
                            style="background-color: #d50100; color: #fff; border: 1px solid #d50100;">
                            S'inscrire
                        </a>
                    @endif
                    @if (Auth::check())
                        <!-- Bouton "Deconnexion" -->
                        <a class="btn btn-sm btn-shadow hover-up" href="{{ url('/logout') }}"
                            style="background-color: #d50100; color: #fff; border: 1px solid #d50100;"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Deconnexion
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <!-- Bouton "Connexion" -->
                        <a class="btn btn-sm btn-shadow hover-up" href="{{ route('home.index') }}"
                            style="background-color:  #d50100; color: #fff; border: 1px solid #e65c00;">
                            Connexion
                        </a>
                    @endif
                </div>

                <!-- Burger menu mobile (toujours visible sur mobile) -->
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
            <li> <a href="{{ url('/') }}"
                    class="nav-link {{ request()->routeIs('home.index') || request()->is('/') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Accueil</a>
            </li>

            <li><a href="{{ route('location') }}"
                    class="nav-link {{ request()->routeIs('location') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Location</a>
            </li>
            <li> <a href="{{ route('offres') }}"
                    class="nav-link {{ request()->is('offres') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Offres</a>
            </li>
            <li> <a href="{{ url('actualite') }}"
                    class="nav-link {{ request()->is('actualite') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Actualités</a>
            </li>
            <li> <a href="{{ url('universite') }}"
                    class="nav-link {{ request()->is('universite') ? ' fw-bold' : 'text-dark' }}"
                    style="color: #d50100;">Universités</a>
            </li>
            </nav>
        </ul>
        <hr>


        <div class="block-signin">
            <!-- Bouton "S'inscrire" -->
            <a href="{{ route('register.client') }}"  class="btn w-100 mb-2"
                style="background-color: #d50100; color: #fff; border: 1px solid #d50100;">
                S'inscrire
            </a>

            @if (Auth::check())
                <!-- Bouton "Deconnexion" -->
                <a class="btn w-100 mb-2" href="{{ url('/logout') }}"
                    style="background-color: #d50100; color: #fff; border: 1px solid #d50100;"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Deconnexion
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none">
                    {{ csrf_field() }}
                </form>
            @else
                <!-- Bouton "Connexion" -->
                <a class="btn w-100 mb-2" href="{{ route('home.index') }}"
                    style="background-color: #d50100; color: #fff; border: 1px solid #d50100;">
                    Connexion
                </a>
            @endif
        </div>

    </div>
</div>
