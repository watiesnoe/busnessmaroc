@extends('layoutsite.site')

@section('titre', 'Universités Partenaires — Business Maroc')

@push('styles')
<style>
    :root {
        --uni-primary: #d50100;
        --uni-navy: #0d1b2a;
        --uni-bg: #f8f9fa;
        --uni-card-shadow: 0 10px 30px rgba(13, 27, 42, 0.04);
        --uni-card-hover: 0 15px 35px rgba(213, 1, 0, 0.08);
    }

    .uni-hero {
        background: linear-gradient(135deg, rgba(13, 27, 42, 0.45) 0%, rgba(26, 46, 68, 0.5) 100%), url('{{ asset("asset/imgs/Université.png") }}') center/cover no-repeat;
        height: 380px;
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 4px solid var(--uni-primary);
    }
    .uni-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 60px;
        background: linear-gradient(to top, var(--uni-bg), transparent);
        pointer-events: none;
    }

    .section-badge {
        display: inline-block;
        background: rgba(213, 1, 0, 0.08);
        color: var(--uni-primary);
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 0.35rem 1rem;
        border-radius: 50px;
        letter-spacing: 1px;
    }

    .glass-badge {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        color: #fff;
        font-weight: 600;
        font-size: 0.78rem;
        padding: 0.4rem 1rem;
        border-radius: 30px;
        letter-spacing: 1px;
    }

    .uni-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #f0f0f0;
        box-shadow: var(--uni-card-shadow);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .uni-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--uni-card-hover);
        border-color: rgba(213, 1, 0, 0.15);
    }

    .uni-logo-wrapper {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffff;
        border-bottom: 1px solid #f8f9fa;
        padding: 1.5rem;
        position: relative;
    }
    .uni-logo-wrapper img {
        max-height: 130px;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }
    .uni-card:hover .uni-logo-wrapper img {
        transform: scale(1.05);
    }

    .uni-body {
        padding: 1.8rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .uni-title {
        font-weight: 800;
        color: var(--uni-navy);
        font-size: 1.15rem;
        margin-bottom: 0.75rem;
        line-height: 1.3;
        transition: color 0.2s;
    }
    .uni-card:hover .uni-title {
        color: var(--uni-primary);
    }

    .uni-desc {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1.25rem;
    }

    .filiere-title {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--uni-navy);
        letter-spacing: 0.5px;
        margin-bottom: 0.75rem;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 0.4rem;
    }
    .filiere-list {
        margin-bottom: 1.25rem;
    }
    .filiere-item {
        font-size: 0.85rem;
        color: #495057;
        margin-bottom: 0.4rem;
        display: flex;
        align-items: center;
    }
    .filiere-item i {
        color: #27ae60;
        font-size: 0.95rem;
        margin-right: 8px;
    }

    .uni-gallery {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 1.5rem;
        margin-top: auto;
    }
    .uni-thumb {
        width: 45px;
        height: 45px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #e9ecef;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: opacity 0.2s;
    }
    .uni-thumb:hover {
        opacity: 0.85;
    }

    .btn-uni-details {
        background: var(--uni-navy);
        color: #ffffff;
        font-weight: 700;
        font-size: 0.9rem;
        padding: 0.75rem;
        border-radius: 12px;
        border: none;
        transition: all 0.2s ease;
        text-align: center;
        text-decoration: none;
        display: block;
        margin-top: auto;
    }
    .uni-card:hover .btn-uni-details {
        background: var(--uni-primary);
        box-shadow: 0 5px 15px rgba(213, 1, 0, 0.2);
    }
</style>
@endpush

@section('content')
{{-- Hero Section --}}
<section class="uni-hero">
    <div class="container position-relative z-2 text-center text-lg-start py-5">
        <div class="row">
            <div class="col-lg-8">
                <span class="glass-badge mb-3 d-inline-block">🎓 ÉDUCATION &amp; PARTENAIRES</span>
                <h1 class="display-4 fw-extrabold text-white mb-3" style="line-height: 1.15; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.65);">
                    Rejoignez Votre <span style="color: var(--uni-primary);">Université</span><br>
                    En Quelques Clics
                </h1>
                <p class="lead text-white-50 mb-0" style="max-width: 600px; font-size: 1.15rem; text-shadow: 0 1px 6px rgba(0,0,0,0.65);">
                    Découvrez nos établissements partenaires d'excellence et leurs programmes pour construire votre avenir académique et professionnel.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Listing Section --}}
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="section-badge mb-2">Nos Établissements</span>
        <h2 class="fw-extrabold text-navy" style="font-weight: 800; font-size: 2.2rem;">Les Grandes Écoles &amp; Universités</h2>
        <p class="text-muted">Explorez les formations proposées par nos partenaires de confiance au Maroc.</p>
    </div>

    <div class="row g-4">
        @foreach ($universites as $universite)
            <div class="col-md-6 col-lg-4">
                <div class="uni-card">
                    {{-- Logo --}}
                    <div class="uni-logo-wrapper">
                        @if ($universite->logo)
                            <img src="{{ asset('storage/' . $universite->logo) }}" alt="Logo {{ $universite->nom }}">
                        @else
                            <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted rounded-3">
                                <i class="bi bi-building fs-1" style="opacity: 0.3;"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div class="uni-body">
                        <h4 class="uni-title">{{ $universite->nom }}</h4>
                        <p class="uni-desc">
                            {{ Str::limit($universite->description, 130) }}
                        </p>

                        {{-- Filières --}}
                        @if ($universite->filieres->count())
                            <div class="filiere-list">
                                <h6 class="filiere-title">Filières principales</h6>
                                @foreach ($universite->filieres->take(4) as $filiere)
                                    <div class="filiere-item">
                                        <i class="bi bi-check-circle-fill"></i>
                                        <span>{{ $filiere->nom }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Photos miniatures --}}
                        @if ($universite->photos->count())
                            <div class="uni-gallery">
                                @foreach ($universite->photos->take(4) as $photo)
                                    <img src="{{ asset('storage/' . $photo->photo) }}" alt="Aperçu {{ $universite->nom }}" class="uni-thumb">
                                @endforeach
                            </div>
                        @endif

                        {{-- Action button --}}
                        <a href="{{ route('universite.detaille', $universite->uuid ?? $universite->id) }}" class="btn-uni-details">
                            Découvrir l'établissement <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
