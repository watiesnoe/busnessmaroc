@extends('layoutsite.site')

@section('titre', $immobilier->titre . ' — Business Maroc')

@section('content')

{{-- Breadcrumb --}}
<div class="bg-white border-bottom py-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none" style="color:var(--brand-red)">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('location') }}" class="text-decoration-none" style="color:var(--brand-red)">Location</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">{{ Str::limit($immobilier->titre, 40) }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5" style="background:#f5f6fa;">
    <div class="container">
        <div class="row g-5">

            {{-- ===== LEFT: Photos + Details ===== --}}
            <div class="col-lg-8">

                {{-- Main Photo Gallery --}}
                <div class="rounded-3 overflow-hidden mb-4 position-relative" style="height:400px;">
                    @php
                        $photoPrincipale = $immobilier->photos->where('principale', true)->first()
                            ?? $immobilier->photos->first();
                    @endphp
                    @if($photoPrincipale)
                        <img id="main-photo" src="{{ get_image_url($photoPrincipale->url) }}"
                            alt="{{ $immobilier->titre }}" class="w-100 h-100" style="object-fit:cover;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:#e9ecef;">
                            <i class="bi bi-house text-muted" style="font-size:5rem;opacity:0.2;"></i>
                        </div>
                    @endif
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge fs-6 px-3 py-2" style="background:rgba(0,0,0,0.55); backdrop-filter:blur(6px);">
                            {{ $immobilier->category->nom ?? 'Logement' }}
                        </span>
                    </div>
                </div>

                {{-- Thumbnails --}}
                @if($immobilier->photos->count() > 1)
                <div class="d-flex gap-2 mb-4 flex-wrap">
                    @foreach($immobilier->photos as $photo)
                    <img src="{{ get_image_url($photo->url) }}" alt="Photo"
                        class="rounded-2 thumb-photo"
                        style="width:80px;height:60px;object-fit:cover;cursor:pointer;border:2px solid transparent;transition:all 0.2s;"
                        onclick="document.getElementById('main-photo').src=this.src; document.querySelectorAll('.thumb-photo').forEach(t=>t.style.borderColor='transparent'); this.style.borderColor='var(--brand-red)';">
                    @endforeach
                </div>
                @endif

                {{-- Title + Meta --}}
                <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-3">
                        <div>
                            <h1 class="fs-3 fw-bold mb-1" style="color:var(--brand-navy);">{{ $immobilier->titre }}</h1>
                            <p class="text-muted mb-0"><i class="bi bi-geo-alt-fill me-1" style="color:var(--brand-red);"></i>
                                {{ $immobilier->ville }}{{ $immobilier->quartier ? ' · '.$immobilier->quartier : '' }}
                            </p>
                        </div>
                        <div class="text-end">
                            <div class="fs-3 fw-bold" style="color:var(--brand-red);">{{ number_format($immobilier->prix,0,',',' ') }} MAD</div>
                            <small class="text-muted">par mois</small>
                        </div>
                    </div>

                    {{-- Property specs --}}
                    <div class="row g-3 mt-2">
                        @if($immobilier->surface)
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 bg-light rounded-3">
                                <i class="bi bi-aspect-ratio d-block fs-4 mb-1" style="color:var(--brand-red);"></i>
                                <div class="fw-bold">{{ $immobilier->surface }} m²</div>
                                <small class="text-muted">Surface</small>
                            </div>
                        </div>
                        @endif
                        @if($immobilier->etage)
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 bg-light rounded-3">
                                <i class="bi bi-building d-block fs-4 mb-1" style="color:var(--brand-red);"></i>
                                <div class="fw-bold">{{ $immobilier->etage }}</div>
                                <small class="text-muted">Étage</small>
                            </div>
                        </div>
                        @endif
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 bg-light rounded-3">
                                <i class="bi bi-door-open d-block fs-4 mb-1" style="color:var(--brand-red);"></i>
                                <div class="fw-bold">{{ $immobilier->chambres->where('statut','disponible')->count() }}</div>
                                <small class="text-muted">Chambres libres</small>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 bg-light rounded-3">
                                @php $statutClass = $immobilier->statut === 'disponible' ? '#27ae60' : '#e74c3c'; @endphp
                                <i class="bi bi-check-circle d-block fs-4 mb-1" style="color:{{ $statutClass }};"></i>
                                <div class="fw-bold text-capitalize">{{ $immobilier->statut }}</div>
                                <small class="text-muted">Statut</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
                    <h5 class="fw-bold mb-3" style="color:var(--brand-navy);">Description</h5>
                    <p class="text-muted lh-lg">{{ $immobilier->description }}</p>
                </div>

                {{-- Chambres --}}
                @php $chambresDispos = $immobilier->chambres->where('statut','disponible'); @endphp
                @if($chambresDispos->count())
                <div id="chambres" class="bg-white rounded-3 shadow-sm p-4">
                    <h5 class="fw-bold mb-4" style="color:var(--brand-navy);">
                        <i class="bi bi-door-open me-2" style="color:var(--brand-red);"></i>
                        Chambres disponibles ({{ $chambresDispos->count() }})
                    </h5>
                    <div class="row g-3">
                        @foreach($chambresDispos as $chambre)
                        <div class="col-md-6">
                            <div class="border rounded-3 overflow-hidden" style="transition:all 0.25s;" onmouseover="this.style.boxShadow='0 4px 20px rgba(0,0,0,0.1)'" onmouseout="this.style.boxShadow='none'">
                                @if($chambre->image)
                                <img src="{{ get_image_url($chambre->image) }}" alt="{{ $chambre->type }}"
                                    class="w-100" style="height:160px;object-fit:cover;">
                                @else
                                <div class="d-flex align-items-center justify-content-center" style="height:120px;background:linear-gradient(135deg,#1a2e44,#2c3e50);">
                                    <i class="bi bi-bed text-white" style="font-size:2.5rem;opacity:0.3;"></i>
                                </div>
                                @endif
                                <div class="p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0">{{ $chambre->type ?? 'Chambre' }}</h6>
                                        <span class="badge bg-success-subtle text-success small">Disponible</span>
                                    </div>
                                    <div class="text-muted small mb-2">
                                        <i class="bi bi-people me-1"></i>{{ $chambre->capacite }} personne(s)
                                    </div>
                                    <div class="d-flex gap-3 small text-muted mb-3">
                                        <span><strong class="text-dark">{{ number_format($chambre->prix_jour,0,',',' ') }}</strong> MAD/jour</span>
                                        <span><strong class="text-dark">{{ number_format($chambre->prix_mois,0,',',' ') }}</strong> MAD/mois</span>
                                    </div>
                                    <a href="{{ route('reservation.chambre', $chambre->id) }}" class="btn btn-brand btn-sm w-100">
                                        <i class="bi bi-calendar-check me-1"></i>Réserver cette chambre
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- ===== RIGHT: Sticky CTA ===== --}}
            <div class="col-lg-4">
                <div class="sticky-top" style="top:90px;">

                    {{-- Price card --}}
                    <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="text-center mb-4">
                            <div class="fs-2 fw-bold" style="color:var(--brand-red);">{{ number_format($immobilier->prix,0,',',' ') }} MAD</div>
                            <div class="text-muted small">par mois</div>
                        </div>
                        @if($chambresDispos->count())
                        <a href="#chambres" class="btn btn-brand w-100 mb-3 py-2">
                            <i class="bi bi-calendar-check me-2"></i>Réserver maintenant
                        </a>
                        @else
                        <button class="btn btn-secondary w-100 mb-3 py-2" disabled>Complet — Aucune chambre libre</button>
                        @endif
                        @php
                            $contactPhone = $immobilier->entreprise?->telephone ?? $immobilier->user?->telephone ?? '+212 6 00 00 00 00';
                            $contactEmail = $immobilier->entreprise?->email ?? $immobilier->user?->email ?? 'contact@businessmaroc.ma';
                            $contactName = $immobilier->entreprise?->nom ?? $immobilier->user?->name ?? 'Support Business Maroc';
                        @endphp
                        <button class="btn btn-outline-secondary w-100" onclick="showContactInfo()">
                            <i class="bi bi-telephone me-1"></i>Contacter le propriétaire
                        </button>
                    </div>

                    {{-- Quick info --}}
                    <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
                        <h6 class="fw-bold mb-3" style="color:var(--brand-navy);">Informations clés</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-2 border-bottom small">
                                <span class="text-muted">Référence</span>
                                <span class="fw-semibold">#{{ str_pad($immobilier->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom small">
                                <span class="text-muted">Catégorie</span>
                                <span class="fw-semibold">{{ $immobilier->category->nom ?? '-' }}</span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom small">
                                <span class="text-muted">Ville</span>
                                <span class="fw-semibold">{{ $immobilier->ville }}</span>
                            </li>
                            @if($immobilier->surface)
                            <li class="d-flex justify-content-between py-2 border-bottom small">
                                <span class="text-muted">Surface</span>
                                <span class="fw-semibold">{{ $immobilier->surface }} m²</span>
                            </li>
                            @endif
                            <li class="d-flex justify-content-between py-2 small">
                                <span class="text-muted">Publié</span>
                                <span class="fw-semibold">{{ $immobilier->created_at->format('d/m/Y') }}</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Share --}}
                    <div class="bg-white rounded-3 shadow-sm p-4 text-center">
                        <p class="small text-muted mb-2 fw-semibold">Partager cette annonce</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width:36px;height:36px;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width:36px;height:36px;"><i class="fab fa-whatsapp"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle" style="width:36px;height:36px;"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
function showContactInfo() {
    Swal.fire({
        title: '<strong>Coordonnées de contact</strong>',
        icon: 'info',
        html:
            '<div class="text-start p-3">' +
            '<p class="mb-2"><strong>Nom :</strong> {{ $contactName }}</p>' +
            '<p class="mb-2"><strong>Téléphone :</strong> <a href="tel:{{ $contactPhone }}" class="text-decoration-none text-danger fw-bold">{{ $contactPhone }}</a></p>' +
            '<p class="mb-0"><strong>Email :</strong> <a href="mailto:{{ $contactEmail }}" class="text-decoration-none text-danger">{{ $contactEmail }}</a></p>' +
            '</div>',
        showCloseButton: true,
        confirmButtonColor: '#c0392b',
        confirmButtonText: '<i class="bi bi-check2-circle me-1"></i> Fermer'
    });
}
</script>
@endsection
