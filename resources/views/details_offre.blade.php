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
        <section class="hero-section position-relative text-white d-flex align-items-center py-5"
            style="
                background-image: url('{{ asset('asset/imgs/offre2.jpg') }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                width: 100%;
                height: 400px;  /* hauteur réduite */
            ">

            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h1 class="display-5 fw-bold mb-3" style="color: #ffffff; text-shadow: 2px 2px 6px rgba(0,0,0,0.7);">
                            <span style="color: #d50100;">Découvrez</span> nos meilleures offres
                        </h1>
                        <p class="lead"
                            style="color: #ffffff; 
                            text-shadow: 1px 1px 5px rgba(0,0,0,0.6); 
                            font-size: 1.5rem;    /* texte plus grand */
                            line-height: 1.8;">
                            Parcourez toutes les opportunités disponibles et trouvez l’offre qui vous correspond le mieux.
                        </p>

                    </div>
                </div>
            </div>
        </section>



       <main class="main bg-light">
    <div class="container my-5">

        <!-- Message en haut -->
        <div class="alert alert-danger shadow-sm rounded-3 mb-4" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <strong>Astuce :</strong> Vérifiez bien les informations avant de postuler !
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- Colonne image -->
            <div class="col-md-5 d-flex">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden w-100 h-100">
                    <img src="{{ $offre->image ?? asset('asset/imgs/img-big3.png') }}" 
                         alt="Offre d'emploi"
                         class="img-fluid w-100 h-100"
                         style="object-fit: cover;">
                </div>
            </div>

            <!-- Colonne infos -->
            <div class="col-md-7 d-flex">
                <div class="card shadow-lg border-0 rounded-4 w-100 h-100 d-flex flex-column">
                    <!-- En-tête -->
                    <div class="card-header text-white rounded-top"
                         style="background: linear-gradient(135deg, #d50100, #ff4d4d);">
                        <h3 class="mb-0">{{ $offre->titre }}</h3>
                        <small>
                            <i class="bi bi-briefcase me-1"></i> {{ ucfirst($offre->type_offre) }}
                            | <i class="bi bi-calendar-event me-1"></i> Publiée le
                            {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}
                        </small>
                    </div>

                    <!-- Corps -->
                    <div class="card-body flex-grow-1">
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2">
                                <i class="bi bi-building text-danger me-2"></i>
                                <strong>Entreprise :</strong> {{ $offre->entreprise }}
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                <strong>Lieu :</strong> {{ $offre->lieu }}
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-diagram-3 text-danger me-2"></i>
                                <strong>Secteur :</strong> {{ $offre->secteur }}
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-mortarboard text-danger me-2"></i>
                                <strong>Niveau requis :</strong> {{ $offre->niveau }}
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-calendar2-x text-danger me-2"></i>
                                <strong>Date limite :</strong> {{ \Carbon\Carbon::parse($offre->date_limite)->format('d/m/Y') }}
                            </li>
                            <li>
                                <i class="bi bi-cash-stack text-danger me-2"></i>
                                <strong>Salaire :</strong> {{ $offre->salaire ? $offre->salaire . ' FCFA' : 'Non spécifié' }}
                            </li>
                        </ul>

                        <h5 class="text-danger fw-bold mb-2">Profil recherché :</h5>
                        <p class="text-muted">{{ $offre->profil_recherche }}</p>

                        <h5 class="text-danger fw-bold mb-2 mt-4">Description du poste :</h5>
                        <p class="text-muted">{{ $offre->description }}</p>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer d-flex justify-content-between align-items-center flex-wrap gap-2">
                        @if ($offre->mode_candidature === 'externe' && $offre->lien_candidature)
                            <a href="{{ $offre->lien_candidature }}" target="_blank" class="btn btn-danger px-4">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Postuler sur le site
                            </a>
                        @else
                            <a href="{{ route('candidature.form', $offre->id) }}" class="btn btn-danger px-4">
                                <i class="bi bi-send me-1"></i> Postuler maintenant
                            </a>
                        @endif

                        <a href="{{ route('offres') }}" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left me-1"></i> Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    @endsection
