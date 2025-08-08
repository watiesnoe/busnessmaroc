<style>
    .image-box img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
    }

    .card-grid-2 {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
</style>
@if ($immobiliers->count())
    @foreach ($immobiliers as $immobilier)
        <div class="col-12 col-md-6 mb-4">
            <div class="card-grid-2 hover-up">
                <div class="row">
                    <!-- Image -->
                    <div class="col-12">
                        <div class="image-box mb-3">
                            <a href="{{ route('immobilier.detail', $immobilier->id) }}">
                               @if ($immobilier->photoPrincipale)
                                    <img src="{{ asset('storage/' . $immobilier->photoPrincipale->url) }}" alt="Photo principale" class="img-fluid rounded">
                                @else
                                    <img src="{{ asset('admin/media/photos/bg_minecraft.png') }}" alt="Aucune image" class="img-fluid rounded">
                                @endif

                            </a>
                        </div>
                    </div>

                    <!-- Infos principales -->
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <a class="fw-bold text-primary" href="{{ route('immobilier.detail', $immobilier->id) }}">
                                {{ $immobilier->category->nom ?? 'Catégorie inconnue' }}
                            </a>
                            <span class="text-muted">{{ $immobilier->ville ?? 'Localisation inconnue' }}</span>
                        </div>

                        <h5 class="mb-2">
                            <a href="{{ route('immobilier.detail', $immobilier->id) }}" class="text-dark">
                                {{ $immobilier->titre ?? 'Sans titre' }}
                            </a>
                        </h5>

                        <p class="font-sm text-muted">
                            {{ Str::limit($immobilier->description, 100) }}
                        </p>

                        <!-- Chambres disponibles -->
                        <div class="mb-3">
                            @foreach ($immobilier->chambres->whereNotIn('statut', ['occupée', 'réservée']) as $chambre)
                                <span class="badge bg-light text-dark me-2">
                                    {{ ucfirst($chambre->type) }}
                                </span>
                            @endforeach

                            <div class="mt-1">
                                <small class="text-success fw-semibold">
                                    {{ $immobilier->chambres->whereNotIn('statut', ['occupée', 'réservée'])->count() }} chambre(s) disponible(s)
                                </small>
                            </div>
                        </div>

                        <!-- Bas de carte -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong class="text-success">
                                    {{ number_format($immobilier->prix, 0, ',', ' ') }} F CFA
                                </strong>
                                <small class="text-muted">/mois</small>
                            </div>
                            <a href="{{ route('immobilier.detail', $immobilier->id) }}" class="btn btn-sm btn-primary text-white">
                                voir detail
                            </a>
                        </div>

                        <div class="mt-2">
                            <span class="badge bg-secondary">{{ $immobilier->statut ?? 'Statut inconnu' }}</span>
                            <span class="text-muted ms-2">{{ $immobilier->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $immobiliers->links() }}
    </div>
@else
    <p>Aucun bien trouvé.</p>
@endif
