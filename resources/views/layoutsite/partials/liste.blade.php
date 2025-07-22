<div class="row g-4">
    @forelse($offres as $offre)
        <div class="col-12">
            <div class="card-grid-2 hover-up rounded shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary">{{ $offre->titre }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $offre->entreprise }}</h6>
                    <p class="card-text">
                        {{ Str::limit(strip_tags($offre->description), 200, '...') }}
                    </p>

                    <ul class="list-unstyled small mb-3">
                        <li><strong>📚 Niveau d’études :</strong> {{ $offre->niveau }}</li>
                        <li><strong>🎓 Expérience :</strong> Étudiant, jeune diplômé et plus</li>
                        <li><strong>📄 Contrat :</strong> {{ ucfirst($offre->type_offre) }}</li>
                        <li><strong>🌍 Région :</strong> {{ $offre->lieu }}</li>
                        <li><strong>🧠 Compétences :</strong>
                            @foreach(explode(',', $offre->profil_recherche) as $competence)
                                <span>{{ trim($competence) }}</span>@if(!$loop->last), @endif
                            @endforeach
                        </li>
                        <li><strong>📅 Publiée le :</strong> {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}</li>
                    </ul>

                    <a href="{{ route('details_offre.show', $offre->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                        Voir l'offre complète
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning">Aucune offre disponible pour le moment.</div>
        </div>
    @endforelse
</div>
