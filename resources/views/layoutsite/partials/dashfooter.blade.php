<footer style="background: #0d1b2a; color: #fff; padding: 80px 0; font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="row gy-5">

            <!-- Logo + Description -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('asset/imgs/logo.jpeg') }}" alt="Logo" style="height: 50px; filter: brightness(0) invert(1);">
                </a>
                <p class="mt-3 text-white-50">
                    Trouvez rapidement des chambres, appartements et maisons à louer à Ségou et ailleurs. Simple, rapide et fiable.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Navigation -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold text-uppercase mb-4">Navigation</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="footer-link">Accueil</a></li>
                    <li><a href="{{ route('location') }}" class="footer-link">Location</a></li>
                    <li><a href="{{ route('offres') }}" class="footer-link">Offres</a></li>
                    <li><a href="{{ url('actualite') }}" class="footer-link">Actualités</a></li>
                    <li><a href="{{ url('universite') }}" class="footer-link">Universités</a></li>
                </ul>
            </div>

            <!-- Liens utiles -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold text-uppercase mb-4">Liens utiles</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">FAQ</a></li>
                    <li><a href="#" class="footer-link">Support</a></li>
                    <li><a href="#" class="footer-link">Conditions</a></li>
                    <li><a href="#" class="footer-link">Confidentialité</a></li>
                </ul>
            </div>

            <!-- Newsletter & Contact -->
            <div class="col-lg-4 col-md-6">
                <h6 class="fw-bold text-uppercase mb-3">Newsletter</h6>
                <p class="text-white-50">Recevez les dernières offres directement dans votre boîte mail :</p>
                <form class="d-flex mb-3">
                    <input type="email" class="form-control me-2" placeholder="Votre email" required>
                    <button type="submit" class="btn btn-cyan fw-bold">S'abonner</button>
                </form>
                <h6 class="fw-bold text-uppercase mb-3 mt-3">Contact</h6>
                <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-cyan"></i> Ségou, Mali</p>
                <p class="mb-1"><i class="fas fa-envelope me-2 text-cyan"></i> contact@locationchambres.ml</p>
                <p><i class="fas fa-phone me-2 text-cyan"></i> +223 76 00 00 00</p>
            </div>

        </div>

        <!-- Bas du footer -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-5 pt-3 border-top border-white-25 small">
            <p class="mb-2 mb-md-0">&copy; 2025 LocationChambres. Tous droits réservés.</p>
            <div class="d-flex gap-3">
                <a href="#" class="footer-link">Politique de confidentialité</a>
                <a href="#" class="footer-link">Conditions d’utilisation</a>
            </div>
        </div>
    </div>

    <style>
        /* Couleurs et hover */
        .text-white-50 { color: rgba(255,255,255,0.7); }
        .footer-link { color: rgba(255,255,255,0.9); text-decoration: none; transition: 0.3s; }
        .footer-link:hover { color: #00bcd4; text-decoration: underline; }

        .social-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px; height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transition: all 0.3s;
            color: #fff;
        }
        .social-icon:hover {
            background: #00bcd4;
            color: #fff;
            transform: translateY(-3px);
        }

        .btn-cyan {
            background-color: #00bcd4;
            color: #0d1b2a;
            border: none;
        }
        .btn-cyan:hover {
            background-color: #00acc1;
            color: #fff;
        }

        @media (max-width: 576px) {
            footer .d-flex.flex-md-row { flex-direction: column !important; text-align: center; gap: 10px; }
        }
    </style>
</footer>
