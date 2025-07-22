    @extends('layoutsite.site')
    @section('content')
        <style>
            .card-body {
                background-color: #fefefe;
                /* Fond très clair pour bien contraster */
                color: #222222;
                /* Texte bien foncé */
                font-size: 1rem;
                /* Taille de police confortable */
                line-height: 1.5;
                /* Meilleure lisibilité */
                padding: 1.5rem !important;
                /* Espace autour du contenu */
            }

            .card-header {
                font-weight: 600;
                font-size: 1.25rem;
            }

            a.text-decoration-none.text-dark:hover {
                color: #0d6efd;
                /* Bootstrap primary blue au hover */
            }

            .badge.bg-light.text-dark {
                font-weight: 500;
            }
        </style>

        <main class="main bg-light-primary">
            <section class="section-box-2">
                <div class="container">
                    <div class="banner-hero banner-single banner-single-bg">
                        <div class="block-banner text-center">
                            <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2">22 Jobs</span>
                                Available Now</h3>
                            <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                                repellendus magni, <br class="d-none d-xl-block">atque delectus molestias quis?</div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-box mt-30">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm rounded border-0" style="min-height: 420px;">
                                    <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                        <h5 class="mb-0 text-white">Se connecter</h5>
                                    </div>
                                    <div class="card-body d-flex flex-column">

                                        <form class="login-register text-start mt-20" action="#">
                                            <div class="form-group">
                                                <label class="form-label" for="input-1">Username or Email address *</label>
                                                <input class="form-control" id="input-1" type="text" required=""
                                                    name="fullname" placeholder="Steven Job">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="input-4">Password *</label>
                                                <input class="form-control" id="input-4" type="password" required=""
                                                    name="password" placeholder="************">
                                            </div>
                                            <div class="login_footer form-group d-flex justify-content-between">
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-small">Remenber me</span><span
                                                        class="checkmark"></span>
                                                </label><a class="text-muted" href="page-contact.html">Forgot Password</a>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-brand-1 hover-up w-100" type="submit"
                                                    name="login">Login</button>
                                            </div>
                                            <div class="text-muted text-center">Don't have an Account? <a
                                                    href="page-signin.html">Sign
                                                    up</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card shadow-sm rounded border-0">
                                    <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                        <h5 class="mb-0 text-white">S'inscrire</h5>
                                    </div>
                                    <div class="card-body">

                                        <!-- Bouton Google -->
                                        <div class="d-grid mb-3">
                                            <button type="button"
                                                class="btn btn-outline-secondary d-flex align-items-center justify-content-center gap-2 py-2">
                                                <img src="{{ asset('assets/imgs/template/icons/icon-google.svg') }}"
                                                    alt="Google" style="width:20px; height:20px;">
                                                <span class="fw-bold">S'inscrire avec Google</span>
                                            </button>
                                        </div>

                                        <!-- Séparateur -->
                                        <div class="text-center mb-4">
                                            <span class="text-muted small">Ou continuer avec</span>
                                        </div>

                                        <!-- Formulaire -->
                                        <form class="login-register" action="#" method="POST">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Nom complet *</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname"
                                                    required placeholder="Ex: Steven Job">
                                            </div>

                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email *</label>
                                                <input type="email" class="form-control" id="emailaddress"
                                                    name="emailaddress" required placeholder="Ex: job@example.com">
                                            </div>

                                            <div class="mb-3">
                                                <label for="username" class="form-label">Nom d'utilisateur *</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    required placeholder="Ex: stevenjob">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Mot de passe *</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="re-password" class="form-label">Confirmer le mot de passe
                                                    *</label>
                                                <input type="password" class="form-control" id="re-password"
                                                    name="re-password" required>
                                            </div>

                                            <!-- Case à cocher -->
                                            <div class="login_footer form-group d-flex justify-content-between">
                                                <label class="cb-container">
                                                    <input type="checkbox" required>
                                                    <span class="text-small">J'accepte les <a href="#"
                                                            class="text-decoration-underline">conditions
                                                            d'utilisation</a></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <a class="text-muted" href="page-contact.html">En savoir plus</a>
                                            </div>

                                            <!-- Bouton d'envoi -->
                                            <div class="d-grid mb-3">
                                                <button type="submit" class="btn btn-primary">Soumettre et
                                                    s'inscrire</button>
                                            </div>

                                            <!-- Lien déjà inscrit -->
                                            {{-- <div class="text-center text-muted">
                                                Déjà inscrit ? <a href="page-signin.html" class="text-decoration-none">Se
                                                    connecter</a>
                                            </div> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
                </div>
            </section>
            {{-- Section newsletter inchangée --}}
            <section class="section-box mt-50 mb-20">
                <div class="container">
                    <div class="box-newsletter">
                        <div class="row">
                            <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                                <img src="assets/imgs/template/newsletter-left.png" alt="joxBox">
                            </div>
                            <div class="col-lg-12 col-xl-6 col-12">
                                <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                                <div class="box-form-newsletter mt-40">
                                    <form class="form-newsletter">
                                        <input class="input-newsletter" type="text" value=""
                                            placeholder="Enter your email here">
                                        <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                                <img src="assets/imgs/template/newsletter-right.png" alt="joxBox">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
