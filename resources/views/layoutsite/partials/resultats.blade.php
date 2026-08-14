@if($immobiliers->count())
    @foreach($immobiliers as $immobilier)
    <div class="col-12">
         <a href="{{ route('immobilier.detail', $immobilier->uuid ?? $immobilier->id) }}" class="text-decoration-none">
            <div class="bg-white rounded-3 shadow-sm overflow-hidden d-flex flex-column flex-md-row hover-card" style="transition:all 0.25s; border:1px solid #f0f0f0;">

                {{-- Image --}}
                <div class="flex-shrink-0 position-relative overflow-hidden" style="width:100%; max-width:280px; min-height:200px;">
                    @php $photoUrl = $immobilier->photoPrincipale?->url ?? $immobilier->photos->first()?->url; @endphp
                    @if($photoUrl)
                        <img src="{{ get_image_url($photoUrl) }}" alt="{{ $immobilier->titre }}"
                            class="w-100 h-100" style="object-fit:cover; min-height:200px; transition:transform 0.4s;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:#e9ecef; min-height:200px;">
                            <i class="bi bi-house text-muted" style="font-size:3rem;opacity:0.3;"></i>
                        </div>
                    @endif
                    <span class="position-absolute top-0 start-0 m-2 badge" style="background:var(--brand-red); font-size:0.72rem;">
                        {{ $immobilier->category->nom ?? 'Logement' }}
                    </span>
                </div>

                {{-- Body --}}
                <div class="p-4 flex-grow-1 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap mb-1">
                            <h5 class="fw-bold mb-0" style="color:var(--brand-navy);">{{ $immobilier->titre }}</h5>
                            <span class="badge bg-light text-muted border" style="font-size:0.72rem;">{{ $immobilier->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-geo-alt-fill me-1" style="color:var(--brand-red);"></i>
                            {{ $immobilier->ville }}{{ $immobilier->quartier ? ' · '.$immobilier->quartier : '' }}
                        </p>
                        <p class="text-muted small mb-3" style="line-height:1.6;">{{ Str::limit($immobilier->description, 120) }}</p>

                        {{-- Tags --}}
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @if($immobilier->surface)
                            <span class="badge bg-light text-dark border small"><i class="bi bi-aspect-ratio me-1 text-muted"></i>{{ $immobilier->surface }} m²</span>
                            @endif
                            @if($immobilier->etage)
                            <span class="badge bg-light text-dark border small"><i class="bi bi-building me-1 text-muted"></i>Étage {{ $immobilier->etage }}</span>
                            @endif
                            @php $dispo = $immobilier->chambres->whereNotIn('statut',['occupee','reservee'])->count(); @endphp
                            <span class="badge border small {{ $dispo > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                <i class="bi bi-door-open me-1"></i>{{ $dispo }} chambre(s) libre(s)
                            </span>
                            @foreach($immobilier->chambres->whereNotIn('statut',['occupee','reservee'])->take(3) as $ch)
                            <span class="badge bg-light text-dark border small">{{ ucfirst($ch->type) }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-3 border-top">
                        <div>
                            <span class="fw-bold fs-5" style="color:var(--brand-red);">{{ number_format($immobilier->prix, 0, ',', ' ') }} MAD</span>
                            <span class="text-muted small">/mois</span>
                        </div>
                        <span class="btn btn-brand btn-sm px-3">Voir détails <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach

    {{-- Pagination --}}
    @if($immobiliers->hasPages())
    <div class="col-12 d-flex justify-content-center mt-2">
        <nav>{{ $immobiliers->links('pagination::bootstrap-5') }}</nav>
    </div>
    @endif

@else
    <div class="col-12 text-center py-5">
        <i class="bi bi-house-x" style="font-size:3.5rem;color:#ddd;"></i>
        <p class="text-muted mt-3 fs-5">Aucun bien ne correspond à vos critères.</p>
        <a href="{{ route('location') }}" class="btn btn-brand-outline mt-2">Effacer les filtres</a>
    </div>
@endif

<style>
.hover-card:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(0,0,0,0.12) !important; }
.hover-card:hover img { transform: scale(1.04); }
</style>
