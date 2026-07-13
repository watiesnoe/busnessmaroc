@extends('layoutsite.site')

@section('titre', $offre->titre . ' — Business Maroc')

@push('styles')
<style>
    :root {
        --job-primary: #d50100;
        --job-navy: #0d1b2a;
        --job-bg: #f8f9fa;
    }

    .job-details-hero {
        background: linear-gradient(135deg, rgba(13, 27, 42, 0.45) 0%, rgba(26, 46, 68, 0.5) 100%), url('{{ asset("asset/imgs/offre2.png") }}') center/cover no-repeat;
        height: 300px;
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 4px solid var(--job-primary);
    }
    .job-details-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 50px;
        background: linear-gradient(to top, var(--job-bg), transparent);
        pointer-events: none;
    }

    .glass-badge {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: #fff;
        font-weight: 600;
        font-size: 0.78rem;
        padding: 0.4rem 1rem;
        border-radius: 30px;
        letter-spacing: 1px;
    }

    .details-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #f0f0f0;
        box-shadow: 0 15px 35px rgba(13, 27, 42, 0.05);
        overflow: hidden;
    }
    .details-header {
        background: var(--job-navy);
        padding: 2.2rem;
        color: #ffffff;
        border-bottom: 4px solid var(--job-primary);
    }
    .details-header h2 {
        color: #ffffff !important;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 0.75rem;
    }
    .details-header .meta-info {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        font-size: 0.9rem;
        color: #e2e8f0 !important;
    }
    .details-header .meta-info i {
        color: #ff4d4d !important;
    }

    .details-body {
        padding: 2.5rem;
    }

    .widget-info-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 2.5rem;
        background: #f8f9fa;
        padding: 1.8rem;
        border-radius: 16px;
        border: 1px solid #e9ecef;
    }
    .widget-info-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .widget-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #ffffff;
        color: var(--job-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        border: 1px solid #e9ecef;
        box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    }
    .widget-label {
        font-size: 0.78rem;
        color: #4b5563 !important;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 2px;
        display: block;
    }
    .widget-value {
        font-size: 0.95rem;
        color: #0f172a !important;
        font-weight: 700;
    }

    .details-section-title {
        font-weight: 800;
        color: var(--job-navy);
        font-size: 1.25rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .details-section-title::before {
        content: '';
        display: inline-block;
        width: 4px;
        height: 18px;
        background: var(--job-primary);
        border-radius: 2px;
    }

    .details-content {
        color: #1e293b !important;
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .btn-apply-job {
        background: linear-gradient(135deg, var(--job-primary) 0%, #b30000 100%);
        border: none;
        color: #ffffff;
        padding: 0.9rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        box-shadow: 0 5px 15px rgba(213, 1, 0, 0.2);
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-apply-job:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(213, 1, 0, 0.35);
        color: #ffffff;
    }

    .btn-back-job {
        background: #f1f3f5;
        color: #495057;
        padding: 0.9rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        border: none;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-back-job:hover {
        background: #e9ecef;
        color: #212529;
    }
</style>
@endpush

@section('content')
{{-- Hero header --}}
<section class="job-details-hero">
    <div class="container position-relative z-2 py-5 text-center text-lg-start">
        <span class="glass-badge mb-3 d-inline-block">💼 OFFRE D'EMPLOI ACTIVE</span>
        <h1 class="display-5 fw-extrabold text-white mb-0" style="font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.65);">Détails de l'opportunité</h1>
    </div>
</section>

{{-- Main Details --}}
<main class="py-5" style="background: var(--job-bg);">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                {{-- Tip info badge --}}
                <div class="alert alert-danger shadow-sm rounded-4 mb-4 border-0 py-3" style="background: #fdf2e9; color: #c0392b;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-info-circle-fill fs-5"></i>
                        <span><strong>Astuce :</strong> Relisez attentivement le profil recherché et préparez vos documents avant de postuler.</span>
                    </div>
                </div>

                <div class="details-card">
                    {{-- Header --}}
                    <div class="details-header">
                        <h2>{{ $offre->titre }}</h2>
                        <div class="meta-info">
                            <span><i class="bi bi-building"></i> {{ $offre->entreprise }}</span>
                            <span>•</span>
                            <span><i class="bi bi-geo-alt"></i> {{ $offre->lieu }}</span>
                            <span>•</span>
                            <span><i class="bi bi-tag"></i> {{ $offre->secteur }}</span>
                        </div>
                    </div>

                    {{-- Body --}}
                    <div class="details-body">
                        
                        {{-- Info widget grid --}}
                        <div class="widget-info-list">
                            <div class="widget-info-item">
                                <div class="widget-icon-box">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <div>
                                    <span class="widget-label">Type Contrat</span>
                                    <span class="widget-value">{{ ucfirst($offre->type_offre) }}</span>
                                </div>
                            </div>
                            <div class="widget-info-item">
                                <div class="widget-icon-box">
                                    <i class="bi bi-mortarboard"></i>
                                </div>
                                <div>
                                    <span class="widget-label">Niveau Requis</span>
                                    <span class="widget-value">{{ $offre->niveau }}</span>
                                </div>
                            </div>
                            <div class="widget-info-item">
                                <div class="widget-icon-box">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                                <div>
                                    <span class="widget-label">Salaire Proposé</span>
                                    <span class="widget-value">
                                        {{ $offre->salaire ? number_format($offre->salaire, 0, ',', ' ') . ' FCFA' : 'Non précisé' }}
                                    </span>
                                </div>
                            </div>
                            <div class="widget-info-item">
                                <div class="widget-icon-box">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div>
                                    <span class="widget-label">Date Limite</span>
                                    <span class="widget-value">
                                        {{ \Carbon\Carbon::parse($offre->date_limite)->format('d/m/Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Section 1: Profil --}}
                        <h4 class="details-section-title">Profil recherché</h4>
                        <div class="details-content">
                            <p style="white-space: pre-line;">{{ $offre->profil_recherche }}</p>
                        </div>

                        {{-- Section 2: Description --}}
                        <h4 class="details-section-title">Description du poste</h4>
                        <div class="details-content mb-0">
                            <p style="white-space: pre-line;">{{ $offre->description }}</p>
                        </div>

                    </div>

                    {{-- Actions Footer --}}
                    <div class="p-4 bg-light border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            @if ($offre->mode_candidature === 'externe')
                                @if (filter_var($offre->lien_candidature, FILTER_VALIDATE_URL))
                                    <a href="{{ $offre->lien_candidature }}" target="_blank" class="btn-apply-job">
                                        <i class="bi bi-box-arrow-up-right"></i> Postuler sur le site externe
                                    </a>
                                @elseif (str_contains($offre->lien_candidature, '@'))
                                    <a href="mailto:{{ $offre->lien_candidature }}" class="btn-apply-job">
                                        <i class="bi bi-envelope"></i> Postuler par email
                                    </a>
                                @elseif (!empty($offre->lien_candidature))
                                    <div class="alert alert-info py-2 px-3 mb-0 small rounded-3 d-inline-block">
                                        <i class="bi bi-info-circle-fill me-1"></i> <strong>Candidature externe :</strong> {{ $offre->lien_candidature }}
                                    </div>
                                @else
                                    <span class="text-muted small"><i class="bi bi-info-circle me-1"></i> Aucun lien de candidature fourni.</span>
                                @endif
                            @else
                                <a href="{{ route('candidature.form', $offre->uuid ?? $offre->id) }}" class="btn-apply-job">
                                    <i class="bi bi-send"></i> Postuler maintenant
                                </a>
                            @endif
                        </div>
                        
                        <a href="{{ route('offres') }}" class="btn-back-job">
                            <i class="bi bi-arrow-left"></i> Retour aux offres
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
@endsection
