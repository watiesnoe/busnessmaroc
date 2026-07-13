<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Business Maroc — Trouvez votre logement idéal au Maroc : appartements, maisons, chambres et événements.">
    <meta name="keywords" content="location, immobilier, appartement, maison, Maroc, chambre, réservation">
    <title>Business Maroc — @yield('titre', 'Logement & Événements')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Bootstrap 5 -->
    <link href="{{ asset('temp_assets/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('temp_assets/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('temp_assets/all.min.css') }}" rel="stylesheet">

    <!-- Existing site assets -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

    <style>
        :root {
            --brand-red: #c0392b;
            --brand-red-dark: #a93226;
            --brand-red-light: #e74c3c;
            --brand-navy: #0d1b2a;
            --brand-navy-mid: #1a2e44;
            --brand-navy-light: #2c3e50;
            --brand-navy-gradient: linear-gradient(135deg, #0d1b2a 0%, #1a2e44 100%);
            --brand-red-gradient: linear-gradient(135deg, #c0392b 0%, #e74c3c 100%);
            --text-light: #f8f9fa;
            --text-muted: #6c757d;
            --card-shadow: 0 8px 30px rgba(0,0,0,0.04);
            --card-hover-shadow: 0 15px 40px rgba(192, 57, 43, 0.12);
            --border-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        html {
            scroll-behavior: smooth;
        }

        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; color: #212529; background: #f8f9fc; }

        /* ===== ENTRY ANIMATIONS ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleUp {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        }

        .animate-fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease forwards;
        }

        .animate-scale-up {
            opacity: 0;
            animation: scaleUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        .bm-navbar {
            background: var(--brand-navy);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 20px rgba(0,0,0,0.25);
        }
        /* Masquer le logo du navbar principal quand le menu mobile (offcanvas) est ouvert pour eviter la superposition */
        body:has(#mobileNav.show) .bm-navbar .navbar-brand {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.15s ease, visibility 0.15s ease;
        }
        .bm-navbar .navbar-brand { font-weight: 800; font-size: 1.4rem; color: #fff; letter-spacing: -0.5px; }
        .bm-navbar .navbar-brand span { color: var(--brand-red-light); }
        .bm-navbar .nav-link {
            color: rgba(255,255,255,0.82) !important;
            font-weight: 500;
            font-size: 0.92rem;
            padding: 0.45rem 0.85rem !important;
            border-radius: 6px;
            transition: var(--transition);
            letter-spacing: 0.2px;
        }
        .bm-navbar .nav-link:hover, .bm-navbar .nav-link.active {
            color: #fff !important;
            background: rgba(255,255,255,0.1);
        }
        .bm-navbar .btn-nav-login {
            background: transparent;
            border: 1.5px solid rgba(255,255,255,0.4);
            color: #fff;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.4rem 1rem;
            transition: var(--transition);
        }
        .bm-navbar .btn-nav-login:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.7); }
        .bm-navbar .btn-nav-signup {
            background: var(--brand-red);
            border: 1.5px solid var(--brand-red);
            color: #fff;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.4rem 1rem;
            transition: var(--transition);
        }
        .bm-navbar .btn-nav-signup:hover { background: var(--brand-red-dark); border-color: var(--brand-red-dark); transform: translateY(-1px); }

        /* ===== SECTION TITLES ===== */
        .section-badge {
            display: inline-block;
            background: rgba(192,57,43,0.1);
            color: var(--brand-red);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 0.3rem 0.85rem;
            border-radius: 30px;
            margin-bottom: 0.6rem;
        }
        .section-heading { font-size: 2rem; font-weight: 800; color: var(--brand-navy); margin-bottom: 0.5rem; }
        .section-sub { color: var(--text-muted); font-size: 1rem; max-width: 560px; margin: 0 auto; }

        /* ===== PROPERTY CARDS ===== */
        .prop-card {
            background: #fff;
            border: none;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .prop-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px rgba(13, 27, 42, 0.08), 0 15px 25px rgba(192, 57, 43, 0.04);
        }
        .prop-card-img {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .prop-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .prop-card:hover .prop-card-img img { transform: scale(1.06); }
        .prop-card-badge {
            position: absolute;
            top: 14px; left: 14px;
            background: rgba(192, 57, 43, 0.9);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            color: #fff;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.35rem 0.8rem;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .prop-card-badge.green { background: rgba(39, 174, 96, 0.9); }
        .prop-card-badge.navy { background: rgba(13, 27, 42, 0.9); }
        .prop-card-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; }
        .prop-card-title { font-size: 1.05rem; font-weight: 700; color: #1a1a2e; margin-bottom: 0.5rem; line-height: 1.4; }
        .prop-card-title a { color: inherit; text-decoration: none; transition: var(--transition); }
        .prop-card-title a:hover { color: var(--brand-red); }
        .prop-card-location { font-size: 0.82rem; color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
        .prop-card-desc { font-size: 0.84rem; color: #555; margin: 0.6rem 0; flex: 1; line-height: 1.5; }
        .prop-card-footer { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f2f4f8; padding-top: 0.85rem; margin-top: 0.85rem; }
        .prop-card-price { font-size: 1.15rem; font-weight: 800; color: var(--brand-red); }
        .prop-card-price small { font-size: 0.78rem; font-weight: 400; color: var(--text-muted); }
        .prop-card-btn {
            background: var(--brand-red);
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 0.45rem 1.1rem;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(192, 57, 43, 0.2);
        }
        .prop-card-btn:hover {
            background: var(--brand-red-dark);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(192, 57, 43, 0.35);
        }
        .prop-card-meta { display: flex; gap: 0.75rem; flex-wrap: wrap; margin: 0.5rem 0; }
        .prop-card-meta span { font-size: 0.78rem; color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
        .prop-card-meta i { color: var(--brand-red); font-size: 0.85rem; }

        /* ===== FOOTER ===== */
        .bm-footer { background: var(--brand-navy); color: rgba(255,255,255,0.8); padding: 64px 0 0; }
        .bm-footer h5 { color: #fff; font-weight: 700; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; }
        .bm-footer a { color: rgba(255,255,255,0.65); text-decoration: none; font-size: 0.9rem; transition: var(--transition); }
        .bm-footer a:hover { color: #fff; padding-left: 4px; }
        .bm-footer li { margin-bottom: 0.45rem; list-style: none; }
        .bm-footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); padding: 1.25rem 0; margin-top: 3rem; text-align: center; font-size: 0.85rem; color: rgba(255,255,255,0.4); }
        .bm-footer-social a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.75);
            margin-right: 8px; transition: var(--transition); font-size: 0.85rem;
        }
        .bm-footer-social a:hover { background: var(--brand-red); color: #fff; transform: translateY(-2px); }

        /* ===== LOADING PRELOADER ===== */
        #bm-preloader {
            position: fixed; inset: 0; background: var(--brand-navy);
            display: flex; align-items: center; justify-content: center;
            z-index: 9999; transition: opacity 0.5s;
        }
        .bm-spinner { width: 44px; height: 44px; border: 4px solid rgba(255,255,255,0.15); border-top-color: var(--brand-red-light); border-radius: 50%; animation: spin 0.75s linear infinite; }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ===== GENERAL UTILS ===== */
        .bg-brand-red { background: var(--brand-red) !important; }
        .text-brand-red { color: var(--brand-red) !important; }
        .btn-brand {
            background: var(--brand-red); color: #fff; border: none;
            padding: 0.55rem 1.4rem; border-radius: 8px; font-weight: 600; font-size: 0.9rem;
            transition: var(--transition);
        }
        .btn-brand:hover { background: var(--brand-red-dark); color: #fff; transform: translateY(-1px); }
        .btn-brand-outline {
            background: transparent; color: var(--brand-red);
            border: 2px solid var(--brand-red); padding: 0.5rem 1.3rem; border-radius: 8px;
            font-weight: 600; font-size: 0.9rem; transition: var(--transition);
        }
        .btn-brand-outline:hover { background: var(--brand-red); color: #fff; }

        .hero-overlay { background: linear-gradient(to bottom, rgba(13,27,42,0.3) 0%, rgba(13,27,42,0.45) 100%); }
        .rounded-xl { border-radius: var(--border-radius) !important; }
        .text-navy { color: var(--brand-navy) !important; }

        /* Force dark text inside all input fields, textareas, and select elements globally */
        .form-control, .form-select, textarea, input[type="text"], input[type="password"], input[type="email"], input[type="tel"], input[type="number"], input[type="date"] {
            color: #1e293b !important;
            background-color: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
        }
        .form-control:focus, .form-select:focus, textarea:focus {
            color: #0f172a !important;
            background-color: #ffffff !important;
            border-color: var(--brand-navy) !important;
        }
        .form-control::placeholder, textarea::placeholder {
            color: #64748b !important;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Preloader -->
    <div id="bm-preloader">
        <div class="bm-spinner"></div>
    </div>

    <!-- ===== NAVBAR ===== -->
    <nav class="bm-navbar navbar navbar-expand-lg">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <span>Business</span> Maroc
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav">
                <i class="bi bi-list text-white fs-4"></i>
            </button>
            <div class="collapse navbar-collapse ms-4">
                <ul class="navbar-nav me-auto gap-1">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') || request()->routeIs('homesite.index') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('location') ? 'active' : '' }}" href="{{ route('location') }}">Location</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('offres') ? 'active' : '' }}" href="{{ route('offres') }}">Offres</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('poulets.index') ? 'active' : '' }}" href="{{ route('poulets.index') }}">Poulets</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('actualite') ? 'active' : '' }}" href="{{ url('actualite') }}">Actualités</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('universite') ? 'active' : '' }}" href="{{ url('universite') }}">Universités</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    @if(!Auth::check())
                        <a href="{{ route('se_connecter') }}" class="btn-nav-login btn">Connexion</a>
                        <a href="{{ route('register.client') }}" class="btn-nav-signup btn">S'inscrire</a>
                    @else
                        <span class="text-white opacity-75 small me-1"><i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}</span>
                        <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-nav-login btn">Déconnexion</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileNav">
        <div class="offcanvas-header" style="background: var(--brand-navy);">
            <span class="fs-5 fw-bold text-white"><span style="color:var(--brand-red-light)">Business</span> Maroc</span>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="list-unstyled p-3 m-0">
                <li class="border-bottom"><a href="{{ url('/') }}" class="d-block py-3 px-2 fw-semibold text-decoration-none {{ request()->is('/') || request()->routeIs('homesite.index') ? 'text-brand-red' : 'text-dark' }}">Accueil</a></li>
                <li class="border-bottom"><a href="{{ route('location') }}" class="d-block py-3 px-2 fw-semibold text-decoration-none {{ request()->routeIs('location') ? 'text-brand-red' : 'text-dark' }}">Location</a></li>
                <li class="border-bottom"><a href="{{ route('offres') }}" class="d-block py-3 px-2 fw-semibold text-decoration-none {{ request()->routeIs('offres') ? 'text-brand-red' : 'text-dark' }}">Offres</a></li>
                <li class="border-bottom"><a href="{{ route('poulets.index') }}" class="d-block py-3 px-2 fw-semibold text-decoration-none {{ request()->routeIs('poulets.index') ? 'text-brand-red' : 'text-dark' }}">Poulets</a></li>
                <li class="border-bottom"><a href="{{ url('actualite') }}" class="d-block py-3 px-2 fw-semibold text-decoration-none {{ request()->is('actualite') ? 'text-brand-red' : 'text-dark' }}">Actualités</a></li>
                <li class="border-bottom"><a href="{{ url('universite') }}" class="d-block py-3 px-2 fw-semibold text-decoration-none {{ request()->is('universite') ? 'text-brand-red' : 'text-dark' }}">Universités</a></li>
            </ul>
            <div class="p-3 d-flex flex-column gap-2">
                @if(!Auth::check())
                    <a href="{{ route('se_connecter') }}" class="btn btn-outline-danger fw-semibold">Connexion</a>
                    <a href="{{ route('register.client') }}" class="btn btn-danger fw-semibold">S'inscrire</a>
                @else
                    <div class="d-flex align-items-center justify-content-center gap-2 mb-2 py-2 border rounded bg-light">
                        <i class="bi bi-person-circle text-secondary fs-5"></i>
                        <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger w-100 fw-semibold">Déconnexion</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- ===== CONTENT ===== -->
    <main>
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bm-footer mt-5">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4 col-md-6">
                    <p class="fs-4 fw-800 text-white mb-2"><span style="color:var(--brand-red-light)">Business</span> Maroc</p>
                    <p class="opacity-75 small lh-lg">Votre plateforme de confiance pour trouver des logements, offres d'emploi et événements au Maroc. Simple, rapide et fiable.</p>
                    <div class="bm-footer-social mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Navigation</h5>
                    <ul class="ps-0">
                        <li><a href="{{ url('/') }}">Accueil</a></li>
                        <li><a href="{{ route('location') }}">Location</a></li>
                        <li><a href="{{ route('offres') }}">Offres</a></li>
                        <li><a href="{{ route('poulets.index') }}">Poulets de chair</a></li>
                        <li><a href="{{ url('actualite') }}">Actualités</a></li>
                        <li><a href="{{ url('universite') }}">Universités</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Liens utiles</h5>
                    <ul class="ps-0">
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Confidentialité</a></li>
                        <li><a href="#">Conditions</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Newsletter</h5>
                    <p class="small opacity-75">Recevez les meilleures offres directement dans votre boîte mail.</p>
                    <form class="d-flex gap-2 mt-2">
                        <input type="email" class="form-control form-control-sm bg-transparent border-secondary text-white" placeholder="votre@email.com">
                        <button type="submit" class="btn btn-brand btn-sm text-nowrap">S'abonner</button>
                    </form>
                    <div class="mt-4">
                        <p class="small mb-2"><i class="fas fa-map-marker-alt me-2" style="color:var(--brand-red-light)"></i>Casablanca, Maroc</p>
                        <p class="small mb-2"><i class="fas fa-envelope me-2" style="color:var(--brand-red-light)"></i>contact@businessmaroc.ma</p>
                        <p class="small mb-0"><i class="fas fa-phone me-2" style="color:var(--brand-red-light)"></i>+212 6 00 00 00 00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bm-footer-bottom">
            <div class="container">
                <span>© {{ date('Y') }} Business Maroc. Tous droits réservés.</span>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @include('layoutsite.partials.dashjavascript')
    @yield('scripts')
    <script>
        window.addEventListener('load', () => {
            const el = document.getElementById('bm-preloader');
            if(el){ el.style.opacity = '0'; setTimeout(()=>el.remove(), 500); }
        });
    </script>
</body>
</html>
