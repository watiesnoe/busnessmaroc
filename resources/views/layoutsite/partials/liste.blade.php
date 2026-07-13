<div class="row g-4">
    @forelse($offres as $offre)
        <div class="col-12">
            <a href="{{ route('details_offre.show', $offre->uuid ?? $offre->id) }}" class="text-decoration-none d-block">
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100" style="transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1); border: 1px solid #f0f0f0 !important;">
                    
                    {{-- Card Header --}}
                    <div class="p-4 bg-white border-bottom d-flex justify-content-between align-items-start gap-3 flex-wrap">
                        <div>
                            <h4 class="fw-bold mb-1" style="color: #0d1b2a; font-size: 1.25rem;">{{ $offre->titre }}</h4>
                            <div class="d-flex align-items-center flex-wrap gap-2 text-muted small">
                                <span><i class="bi bi-building me-1"></i> {{ $offre->entreprise }}</span>
                                <span class="text-secondary">•</span>
                                <span><i class="bi bi-geo-alt me-1"></i> {{ $offre->lieu }}</span>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill fw-bold" style="font-size: 0.8rem;">
                                {{ ucfirst($offre->type_offre) }}
                            </span>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="p-4 bg-white d-flex flex-column justify-content-between">
                        <div>
                            <p class="text-muted small mb-3" style="line-height: 1.6;">
                                {{ Str::limit(strip_tags($offre->description), 140, '...') }}
                            </p>

                            {{-- Key Qualifications --}}
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-light text-dark border small">
                                    <i class="bi bi-mortarboard me-1 text-muted"></i> {{ $offre->niveau }}
                                </span>
                                @if($offre->salaire)
                                <span class="badge bg-light text-dark border small">
                                    <i class="bi bi-cash-stack me-1 text-muted"></i> {{ number_format($offre->salaire, 0, ',', ' ') }} FCFA
                                </span>
                                @else
                                <span class="badge bg-light text-dark border small">
                                    <i class="bi bi-cash-stack me-1 text-muted"></i> Non précisé
                                </span>
                                @endif
                            </div>

                            {{-- Competences list --}}
                            @if($offre->profil_recherche)
                            <div class="d-flex flex-wrap gap-1.5 pt-2">
                                @foreach (explode(',', $offre->profil_recherche) as $competence)
                                    @if(trim($competence))
                                    <span class="badge bg-light text-secondary border rounded-3 small px-2 py-1.5" style="font-size: 0.78rem;">
                                        {{ trim($competence) }}
                                    </span>
                                    @endif
                                @endforeach
                            </div>
                            @endif
                        </div>

                        {{-- Card Footer --}}
                        <div class="d-flex justify-content-between align-items-center pt-3 mt-3 border-top">
                            <span class="text-muted small">
                                <i class="bi bi-calendar-event me-1"></i> Publiée le {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}
                            </span>
                            <span class="text-danger fw-bold small d-flex align-items-center gap-1">
                                En savoir plus <i class="bi bi-arrow-right"></i>
                            </span>
                        </div>
                    </div>

                </div>
            </a>
        </div>
    @empty
        <div class="col-12">
            <div class="card border-0 rounded-4 shadow-sm p-5 text-center">
                <i class="bi bi-briefcase text-muted" style="font-size: 3.5rem; opacity: 0.3;"></i>
                <p class="text-muted mt-3 fs-5 mb-0">Aucune offre disponible pour le moment.</p>
            </div>
        </div>
    @endforelse

    {{-- Pagination --}}
    @if($offres->hasPages())
    <div class="col-12 d-flex justify-content-center mt-3">
        {!! $offres->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
    @endif
</div>

<style>
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(13, 27, 42, 0.08) !important;
        border-color: rgba(213, 1, 0, 0.15) !important;
    }
</style>
