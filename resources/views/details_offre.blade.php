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
            <div class="container my-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">{{ $offre->titre }}</h3>
                        <small>{{ $offre->type_offre }} | Publiée le {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}</small>
                    </div>
                    <div class="card-body">
                        <p><strong>Entreprise :</strong> {{ $offre->entreprise }}</p>
                        <p><strong>Lieu :</strong> {{ $offre->lieu }}</p>
                        <p><strong>Secteur :</strong> {{ $offre->secteur }}</p>
                        <p><strong>Niveau requis :</strong> {{ $offre->niveau }}</p>
                        <p><strong>Date limite de candidature :</strong> {{ \Carbon\Carbon::parse($offre->date_limite)->format('d/m/Y') }}</p>
                        <p><strong>Salaire :</strong> {{ $offre->salaire ? $offre->salaire . ' FCFA' : 'Non spécifié' }}</p>
                        <hr>
                        <h5>Profil recherché :</h5>
                        <p>{{ $offre->profil_recherche }}</p>
                        <h5>Description du poste :</h5>
                        <p>{{ $offre->description }}</p>
                    </div>

                    <div class="card-footer text-end d-flex justify-content-between align-items-center flex-wrap gap-2">
                        @if ($offre->mode_candidature === 'externe' && $offre->lien_candidature)
                            <a href="{{ $offre->lien_candidature }}" target="_blank" class="btn btn-success">
                                <i class="fas fa-external-link-alt me-1"></i> Postuler sur le site de l'entreprise
                            </a>
                        @else
                            <a href="{{ route('candidature.form', $offre->id) }}" class="btn btn-success">
                                <i class="fas fa-paper-plane me-1"></i> Postuler maintenant
                            </a>
                        @endif

                        <a href="{{ route('offre.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>


        </main>
    @endsection
