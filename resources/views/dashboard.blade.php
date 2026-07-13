@extends('layoutsite.site')

@section('titre', 'Trouvez votre logement idéal au Maroc')

@push('styles')
<style>
    @keyframes zoomBackground {
        from { transform: scale(1.08); }
        to { transform: scale(1); }
    }
    .bm-hero-bg {
        animation: zoomBackground 8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        background-image: url('{{ asset('asset/imgs/accueil1.png') }}');
        background-size: cover;
        background-position: center;
    }
    .glass-search-container {
        background: rgba(255, 255, 255, 0.12) !important;
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.22) !important;
        box-shadow: 0 24px 50px rgba(0, 0, 0, 0.25) !important;
        border-radius: 20px !important;
    }
    .glass-search-input {
        background: rgba(255, 255, 255, 0.95) !important;
        color: #0d1b2a !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        border-radius: 12px !important;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .glass-search-input:focus {
        background: #ffffff !important;
        box-shadow: 0 0 0 4px rgba(192, 57, 43, 0.2) !important;
        border-color: var(--brand-red) !important;
    }
    .hover-scale {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .hover-scale:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 12px 30px rgba(192, 57, 43, 0.4) !important;
    }
    .why-card:hover {
        transform: translateY(-8px);
        background: rgba(255, 255, 255, 0.08) !important;
        border-color: rgba(192, 57, 43, 0.4) !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3) !important;
    }
    .why-card:hover .icon-box {
        background: var(--brand-red) !important;
        color: #ffffff !important;
        box-shadow: 0 0 20px rgba(192, 57, 43, 0.6) !important;
        transform: scale(1.08);
    }
    .btn-cta-primary {
        background: #ffffff;
        color: var(--brand-red) !important;
        border: none;
        font-weight: 700;
        padding: 0.7rem 2.2rem;
        border-radius: 30px;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        text-decoration: none;
    }
    .btn-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.25);
        background: #fdfdfd;
        color: var(--brand-red-dark) !important;
    }
    .btn-cta-outline {
        background: transparent;
        border: 2px solid #ffffff;
        color: #ffffff !important;
        font-weight: 700;
        padding: 0.7rem 2.2rem;
        border-radius: 30px;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        text-decoration: none;
    }
    .btn-cta-outline:hover {
        background: #ffffff;
        color: var(--brand-red) !important;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.25);
    }
</style>
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<section class="bm-hero position-relative d-flex align-items-center overflow-hidden" style="min-height: 600px;">
    <div class="bm-hero-bg position-absolute inset-0 w-100 h-100"></div>
    <div class="hero-overlay position-absolute inset-0 w-100 h-100 z-1" style="background: linear-gradient(to bottom, rgba(13, 27, 42, 0.4) 0%, rgba(13, 27, 42, 0.6) 100%);"></div>
    <div class="container position-relative z-2 py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <p class="section-badge text-white bg-white bg-opacity-10 border border-white border-opacity-25 mb-3 animate-fade-in-up" style="font-size:0.8rem; letter-spacing:2px;">N°1 au Maroc</p>
                <h1 class="display-4 fw-800 text-white mb-3 lh-sm animate-fade-in-up delay-1" style="font-weight:800; text-shadow: 0 2px 20px rgba(0,0,0,0.4);">
                    Trouvez votre<br>
                    <span style="color:#f87171;">logement idéal</span> au Maroc
                </h1>
                <p class="lead text-white mb-5 opacity-90 animate-fade-in-up delay-2" style="text-shadow: 0 1px 6px rgba(0,0,0,0.5);">
                    Maisons, appartements, chambres et événements — tout en un seul endroit.
                </p>

                {{-- Search bar --}}
                <div class="glass-search-container p-3 d-flex flex-column flex-md-row gap-2 align-items-stretch animate-fade-in-up delay-3" style="max-width:760px; margin:0 auto;">
                    <div class="input-group flex-grow-1">
                        <span class="input-group-text bg-transparent border-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control border-0 shadow-none glass-search-input" placeholder="Ville, quartier ou mot-clé...">
                    </div>
                    <select class="form-select border-0 shadow-none glass-search-input bg-light" style="max-width:180px; min-width:140px;">
                        <option value="">Catégorie</option>
                        <option>Maison</option>
                        <option>Appartement</option>
                        <option>Chambre</option>
                        <option>Immeuble</option>
                    </select>
                    <a href="{{ route('location') }}" class="btn btn-brand px-4 text-nowrap rounded-2 hover-scale" style="background: var(--brand-red); border-color: var(--brand-red);">
                        <i class="bi bi-search me-1"></i> Rechercher
                    </a>
                </div>

                {{-- Quick stats --}}
                <div class="d-flex justify-content-center gap-4 mt-5 flex-wrap animate-fade-in-up delay-4">
                    <div class="text-white text-center">
                        <div class="fs-3 fw-bold">1 200+</div>
                        <div class="opacity-75 small">Annonces actives</div>
                    </div>
                    <div class="text-white text-center">
                        <div class="fs-3 fw-bold">40+</div>
                        <div class="opacity-75 small">Villes couvertes</div>
                    </div>
                    <div class="text-white text-center">
                        <div class="fs-3 fw-bold">5 000+</div>
                        <div class="opacity-75 small">Utilisateurs satisfaits</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== ANNONCES VEDETTE (carousel) ===== --}}
@if($annoncesVedette->count())
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Sélection</span>
            <h2 class="section-heading">Annonces à la une</h2>
            <p class="section-sub">Nos meilleures offres sélectionnées pour vous</p>
        </div>
        <div class="row g-4">
            @foreach($annoncesVedette as $annonce)
            <div class="col-md-4 col-lg-{{ $annoncesVedette->count() >= 5 ? '2' : '4' }}">
                <a href="{{ route('immobilier.detail', $annonce->uuid ?? $annonce->id) }}" class="text-decoration-none">
                    <div class="position-relative rounded-3 overflow-hidden" style="height:260px;">
                        <img src="{{ $annonce->photoPrincipale?->url ? asset('storage/'.$annonce->photoPrincipale->url) : asset('admin/media/photos/bg_minecraft.png') }}"
                            class="w-100 h-100" style="object-fit:cover; transition:transform 0.4s;"
                            onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                        <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background:linear-gradient(transparent, rgba(0,0,0,0.75));">
                            <div class="text-white fw-bold">{{ $annonce->titre }}</div>
                            <div class="text-white opacity-75 small">{{ number_format($annonce->prix,0,',',' ') }} MAD/mois</div>
                        </div>
                        <span class="position-absolute top-0 end-0 m-2 badge" style="background:var(--brand-red); font-size:0.72rem;">À la une</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== BIENS IMMOBILIERS ===== --}}
<section class="py-5" style="background:#f5f6fa;">
    <div class="container">
        <div class="d-flex align-items-end justify-content-between mb-5 flex-wrap gap-3">
            <div>
                <span class="section-badge">Logements</span>
                <h2 class="section-heading mb-0">Maisons & Appartements</h2>
                <p class="text-muted mt-1 mb-0">Découvrez nos meilleures offres de location au Maroc</p>
            </div>
            <a href="{{ route('location') }}" class="btn-brand-outline btn">Voir tout <i class="bi bi-arrow-right ms-1"></i></a>
        </div>

        <div class="row g-4">
            @php $count = 0; @endphp
            @foreach($immobiliers as $immobilier)
                @if(strtolower($immobilier->category->nom ?? '') !== 'chambre' && $count < 6)
                @php $count++; @endphp
                <div class="col-xl-4 col-md-6">
                    <div class="prop-card">
                        <div class="prop-card-img">
                            @if($immobilier->photoPrincipale?->url)
                                <img src="{{ asset('storage/'.$immobilier->photoPrincipale->url) }}" alt="{{ $immobilier->titre }}">
                            @else
                                <img src="{{ asset('admin/media/photos/bg_minecraft.png') }}" alt="{{ $immobilier->titre }}">
                            @endif
                            <span class="prop-card-badge green">{{ $immobilier->category->nom ?? 'Logement' }}</span>
                        </div>
                        <div class="prop-card-body">
                            <div class="prop-card-location mb-1">
                                <i class="bi bi-geo-alt-fill" style="color:var(--brand-red);font-size:0.82rem;"></i>
                                {{ $immobilier->ville }}{{ $immobilier->quartier ? ' · '.$immobilier->quartier : '' }}
                            </div>
                            <h6 class="prop-card-title">
                                <a href="{{ route('immobilier.detail', $immobilier->uuid ?? $immobilier->id) }}">{{ $immobilier->titre }}</a>
                            </h6>
                            <div class="prop-card-meta">
                                @if($immobilier->surface)<span><i class="bi bi-aspect-ratio"></i>{{ $immobilier->surface }} m²</span>@endif
                                @if($immobilier->etage)<span><i class="bi bi-building"></i>Étage {{ $immobilier->etage }}</span>@endif
                                <span><i class="bi bi-door-open"></i>{{ $immobilier->chambres->where('statut','disponible')->count() }} chambre(s)</span>
                            </div>
                            <p class="prop-card-desc">{{ Str::limit($immobilier->description, 90) }}</p>
                            <div class="prop-card-footer">
                                <div>
                                    <div class="prop-card-price">{{ number_format($immobilier->prix, 0, ',', ' ') }} MAD <small>/mois</small></div>
                                </div>
                                <a href="{{ route('immobilier.detail', $immobilier->uuid ?? $immobilier->id) }}" class="prop-card-btn">Voir détails</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        @if($count === 0)
        <div class="text-center py-5 text-muted">
            <i class="bi bi-house fs-1 d-block mb-3 opacity-25"></i>
            Aucun bien disponible pour le moment.
        </div>
        @endif
    </div>
</section>

{{-- ===== LOCATION PAR CHAMBRE ===== --}}
@php $chambres = $immobiliers->filter(fn($i) => strtolower($i->category->nom ?? '') === 'chambre'); @endphp
@if($chambres->count())
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex align-items-end justify-content-between mb-5 flex-wrap gap-3">
            <div>
                <span class="section-badge">Chambres</span>
                <h2 class="section-heading mb-0">Location par Chambre</h2>
                <p class="text-muted mt-1 mb-0">Des chambres confortables, pratiques et bien situées</p>
            </div>
            <a href="{{ route('location') }}" class="btn-brand-outline btn">Voir tout <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            @foreach($chambres->take(6) as $immobi)
            <div class="col-xl-4 col-md-6">
                <div class="prop-card">
                    <div class="prop-card-img">
                        @php $firstPhoto = $immobi->photos->first(); @endphp
                        @if($firstPhoto)
                            <img src="{{ asset('storage/'.$firstPhoto->url) }}" alt="{{ $immobi->titre }}">
                        @else
                            <img src="{{ asset('admin/media/photos/bg_minecraft.png') }}" alt="{{ $immobi->titre }}">
                        @endif
                        <span class="prop-card-badge navy">Chambre</span>
                    </div>
                    <div class="prop-card-body">
                        <div class="prop-card-location mb-1">
                            <i class="bi bi-geo-alt-fill" style="color:var(--brand-red);font-size:0.82rem;"></i>
                            {{ $immobi->ville }}{{ $immobi->quartier ? ' · '.$immobi->quartier : '' }}
                        </div>
                        @php
                            $targetChambre = $immobi->chambres->where('statut', 'disponible')->first() ?? $immobi->chambres->first();
                        @endphp
                        <h6 class="prop-card-title">
                            @if($targetChambre)
                                <a href="{{ route('reservation.chambre', $targetChambre->id) }}">{{ $immobi->titre }}</a>
                            @else
                                <a href="#">{{ $immobi->titre }}</a>
                            @endif
                        </h6>
                        <p class="prop-card-desc">{{ Str::limit($immobi->description, 90) }}</p>
                        <div class="prop-card-footer">
                            <div>
                                <div class="prop-card-price">{{ number_format($immobi->prix, 0, ',', ' ') }} MAD <small>/mois</small></div>
                            </div>
                            @if($targetChambre)
                                <a href="{{ route('reservation.chambre', $targetChambre->id) }}" class="prop-card-btn">Réserver</a>
                            @else
                                <button class="prop-card-btn" style="background:#6c757d;" disabled>Complet</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== WHY CHOOSE US ===== --}}
<section class="py-5" style="background: linear-gradient(180deg, var(--brand-navy) 0%, #08111a 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge bg-white bg-opacity-10 text-white border border-white border-opacity-25">Pourquoi nous</span>
            <h2 class="text-white fw-bold fs-1 mt-2">La plateforme de référence au Maroc</h2>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <div class="why-card p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);">
                    <div class="icon-box d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background: rgba(192, 57, 43, 0.1); border: 1px solid rgba(192, 57, 43, 0.25); color: #f87171; font-size: 1.8rem; transition: all 0.3s ease;">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <h6 class="text-white fw-bold mb-2">Fiable & Vérifié</h6>
                    <p class="text-white opacity-50 small mb-0">Toutes nos annonces sont vérifiées par notre équipe</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);">
                    <div class="icon-box d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background: rgba(192, 57, 43, 0.1); border: 1px solid rgba(192, 57, 43, 0.25); color: #f87171; font-size: 1.8rem; transition: all 0.3s ease;">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h6 class="text-white fw-bold mb-2">Rapide</h6>
                    <p class="text-white opacity-50 small mb-0">Réservez en quelques clics depuis votre smartphone</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);">
                    <div class="icon-box d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background: rgba(192, 57, 43, 0.1); border: 1px solid rgba(192, 57, 43, 0.25); color: #f87171; font-size: 1.8rem; transition: all 0.3s ease;">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <h6 class="text-white fw-bold mb-2">Sécurisé</h6>
                    <p class="text-white opacity-50 small mb-0">Paiements sécurisés et contrats numériques protégés</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card p-4 rounded-4 h-100" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);">
                    <div class="icon-box d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 70px; height: 70px; background: rgba(192, 57, 43, 0.1); border: 1px solid rgba(192, 57, 43, 0.25); color: #f87171; font-size: 1.8rem; transition: all 0.3s ease;">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h6 class="text-white fw-bold mb-2">Personnalisé</h6>
                    <p class="text-white opacity-50 small mb-0">Des offres adaptées à votre budget et localisation</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== ACTUALITES ===== --}}
@if(isset($actualites) && $actualites->count())
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Blog</span>
            <h2 class="section-heading">Actualités & Conseils</h2>
            <p class="section-sub">Les dernières nouveautés et conseils pour bien louer votre logement</p>
        </div>
        <div class="row g-4">
            @foreach($actualites->take(3) as $actu)
            <div class="col-md-4">
                <div class="prop-card h-100">
                    <div class="prop-card-img" style="height:200px;">
                        @if($actu->image)
                            <img src="{{ asset('storage/'.$actu->image) }}" alt="{{ $actu->titre }}">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:linear-gradient(135deg,#1a2e44,var(--brand-red));">
                                <i class="bi bi-newspaper text-white" style="font-size:3rem;opacity:0.4;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="prop-card-body">
                        <span class="badge mb-2" style="background:rgba(192,57,43,0.1);color:var(--brand-red);font-size:0.72rem;">Actualité</span>
                        <h6 class="prop-card-title">{{ $actu->titre }}</h6>
                        <p class="prop-card-desc">{{ Str::limit(strip_tags($actu->contenu ?? $actu->description ?? ''), 100) }}</p>
                        <div class="prop-card-footer">
                            <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($actu->date_publication)->format('d M Y') }}</small>
                            <a href="#" class="prop-card-btn">Lire</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== CTA ===== --}}
<section class="py-5" style="background: linear-gradient(135deg, var(--brand-red) 0%, #781d14 50%, var(--brand-navy) 100%);">
    <div class="container text-center py-4">
        <h2 class="text-white fw-bold fs-1 mb-3">Prêt à trouver votre logement ?</h2>
        <p class="text-white opacity-80 mb-5 fs-5">Rejoignez des milliers de Marocains qui font confiance à Business Maroc.</p>
        <div class="d-flex gap-4 justify-content-center flex-wrap">
            <a href="{{ route('location') }}" class="btn-cta-primary">
                <i class="bi bi-search me-2"></i>Parcourir les annonces
            </a>
            @if(!Auth::check())
            <a href="{{ route('register.client') }}" class="btn-cta-outline">
                <i class="bi bi-person-plus me-2"></i>Créer un compte
            </a>
            @endif
        </div>
    </div>
</section>

@endsection
