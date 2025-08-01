<div class="row g-4">
    @forelse($offres as $offre)
        <div class="col-12">
            <div class="card p-4 rounded-4 shadow-sm border-0 bg-white h-100">
                <div class="card-body">
                    <!-- Titre et Salaire -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                        <h5 class="fw-bold text-primary mb-2 mb-md-0">{{ $offre->titre }}</h5>
                        <span class="badge bg-success text-white fs-6">📈 Estimé : {{ $offre->salaire ?? 'Non précisé' }}</span>
                    </div>

                    <!-- Entreprise -->
                    <h6 class="text-muted mb-3">{{ $offre->entreprise }}</h6>

                    <!-- Description -->
                    <p class="text-secondary">{{ Str::limit(strip_tags($offre->description), 200, '...') }}</p>

                    <hr class="my-3">

                    <!-- Infos -->
                    <ul class="list-unstyled small text-dark">
                        <li class="mb-2"><i class="bi bi-mortarboard-fill text-primary me-2"></i><strong>Niveau :</strong> {{ $offre->niveau }}</li>
                        <li class="mb-2"><i class="bi bi-person-workspace text-primary me-2"></i><strong>Expérience :</strong> Étudiant, jeune diplômé et plus</li>
                        <li class="mb-2"><i class="bi bi-file-earmark-text text-primary me-2"></i><strong>Contrat :</strong> {{ ucfirst($offre->type_offre) }}</li>
                        <li class="mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i><strong>Région :</strong> {{ $offre->lieu }}</li>
                        <li class="mb-2">
                            <i class="bi bi-stars text-primary me-2"></i><strong>Compétences :</strong><br>
                            <div class="d-flex flex-wrap mt-1">
                                @foreach(explode(',', $offre->profil_recherche) as $competence)
                                    <span class="">{{ trim($competence) }}</span>
                                @endforeach
                            </div>
                        </li>
                        <li class="mb-1"><i class="bi bi-calendar-date text-primary me-2"></i><strong>Publiée le :</strong> {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}</li>
                    </ul>

                    <!-- Bouton -->
                    <div class="text-end mt-4">
                        <a href="{{ route('details_offre.show', $offre->id) }}" class="btn btn-outline-primary rounded-pill px-4">
                            Voir l'offre complète
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning">Aucune offre disponible pour le moment.</div>
        </div>
    @endforelse
</div>
