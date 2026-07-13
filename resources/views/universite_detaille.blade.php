@extends('layoutsite.site')

@section('titre', $universite->nom . ' — Business Maroc')

@push('styles')
<style>
    :root {
        --uni-primary: #d50100;
        --uni-navy: #0d1b2a;
        --uni-bg: #f8f9fa;
    }

    .uni-detail-hero {
        background: linear-gradient(135deg, rgba(13, 27, 42, 0.45) 0%, rgba(26, 46, 68, 0.5) 100%), url('{{ asset("asset/imgs/Université.png") }}') center/cover no-repeat;
        height: 320px;
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 4px solid var(--uni-primary);
    }
    .uni-detail-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 50px;
        background: linear-gradient(to top, var(--uni-bg), transparent);
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

    .profile-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #f0f0f0;
        box-shadow: 0 15px 35px rgba(13, 27, 42, 0.04);
        padding: 2.5rem;
        margin-top: -100px;
        position: relative;
        z-index: 10;
    }

    .logo-container {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: #ffffff;
        border: 4px solid #ffffff;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        overflow: hidden;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .logo-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .section-title-custom {
        font-weight: 800;
        color: var(--uni-navy);
        font-size: 1.25rem;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title-custom::before {
        content: '';
        display: inline-block;
        width: 4px;
        height: 18px;
        background: var(--uni-primary);
        border-radius: 2px;
    }

    .contact-info-list li {
        margin-bottom: 0.75rem;
        color: #1e293b !important;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .contact-info-list i {
        color: var(--uni-primary);
        font-size: 1.1rem;
    }

    .gallery-img-wrapper {
        border-radius: 16px;
        overflow: hidden;
        aspect-ratio: 1;
        cursor: pointer;
        border: 1px solid #e9ecef;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .gallery-img-wrapper:hover {
        transform: scale(1.04);
        box-shadow: 0 10px 25px rgba(13, 27, 42, 0.1);
    }
    .gallery-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .filiere-card-custom {
        background: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 8px 25px rgba(13, 27, 42, 0.02);
        height: 100%;
        transition: all 0.3s ease;
    }
    .filiere-card-custom:hover {
        transform: translateY(-3px);
        border-color: rgba(213, 1, 0, 0.15);
        box-shadow: 0 12px 30px rgba(213, 1, 0, 0.06);
    }
    .filiere-card-custom h5 {
        font-weight: 800;
        color: var(--uni-navy);
        font-size: 1.05rem;
        margin-bottom: 0.5rem;
    }
    .filiere-card-custom p {
        color: #4b5563 !important;
        font-size: 0.88rem;
        line-height: 1.5;
        margin-bottom: 0;
    }
    .uni-description {
        color: #1e293b !important;
        line-height: 1.75;
        font-size: 0.98rem;
        margin-bottom: 0;
    }
</style>
@endpush

@section('content')
{{-- Hero header --}}
<section class="uni-detail-hero">
    <div class="container position-relative z-2 py-5 text-center text-lg-start">
        <span class="glass-badge mb-3 d-inline-block">🎓 FIÈREMENT PARTENAIRE</span>
        <h1 class="display-5 fw-extrabold text-white mb-0" style="font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.65);">Détails de l'établissement</h1>
    </div>
</section>

{{-- Main Details --}}
<main style="background: var(--uni-bg); padding-bottom: 5rem;">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="profile-card mb-4">
                    {{-- Header Profile logo & Title --}}
                    <div class="text-center mb-5">
                        @if ($universite->logo)
                            <div class="logo-container">
                                <img src="{{ asset('storage/' . $universite->logo) }}" alt="Logo {{ $universite->nom }}">
                            </div>
                        @endif
                        <h2 class="fw-extrabold text-navy" style="font-weight: 800; color: var(--uni-navy);">{{ $universite->nom }}</h2>
                        <p class="text-muted small mb-0"><i class="bi bi-geo-alt me-1"></i> {{ $universite->ville }}, {{ $universite->pays }}</p>
                    </div>

                    {{-- Section 1: Presentation --}}
                    @if ($universite->description)
                        <div class="mb-5">
                            <h4 class="section-title-custom">Présentation de l'établissement</h4>
                            <p class="uni-description">
                                {{ $universite->description }}
                            </p>
                        </div>
                    @endif

                    {{-- Section 2: Contact Info --}}
                    <div class="mb-5">
                        <h4 class="section-title-custom">Informations de contact</h4>
                        <ul class="list-unstyled contact-info-list mb-0">
                            @if ($universite->adresse)
                                <li>
                                    <i class="bi bi-map"></i>
                                    <span><strong>Adresse :</strong> {{ $universite->adresse }}</span>
                                </li>
                            @endif
                            @if ($universite->email)
                                <li>
                                    <i class="bi bi-envelope"></i>
                                    <span><strong>Adresse e-mail :</strong> <a href="mailto:{{ $universite->email }}" class="text-decoration-none text-dark fw-bold">{{ $universite->email }}</a></span>
                                </li>
                            @endif
                            @if ($universite->telephone)
                                <li>
                                    <i class="bi bi-telephone"></i>
                                    <span><strong>Téléphone :</strong> {{ $universite->telephone }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    {{-- Section 3: Gallery --}}
                    @if ($universite->photos->count())
                        <div class="mb-5">
                            <h4 class="section-title-custom">Galerie de photos</h4>
                            <div class="row g-3">
                                @foreach ($universite->photos as $photo)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="gallery-img-wrapper class-photo-click">
                                            <img src="{{ asset('storage/' . $photo->photo) }}" alt="Aperçu {{ $universite->nom }}" class="universite-photo">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Section 4: Programs/Courses --}}
                    @if ($universite->filieres->count())
                        <div>
                            <h4 class="section-title-custom">Filières &amp; Formations proposées</h4>
                            <div class="row g-4">
                                @foreach ($universite->filieres as $filiere)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="filiere-card-custom">
                                            <h5>{{ $filiere->nom }}</h5>
                                            <p>{{ $filiere->description ?? 'Aucune description détaillée disponible pour cette filière.' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>

    </div>
</main>

{{-- Lightbox HTML --}}
<div id="lightbox" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(13, 27, 42, 0.95); justify-content:center; align-items:center; z-index:1080; cursor:pointer;">
    <img id="lightbox-img" src="" alt="Agrandissement" style="max-width:90%; max-height:85%; border-radius:16px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); transition: transform 0.2s;">
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.universite-photo').on('click', function() {
            var src = $(this).attr('src');
            $('#lightbox-img').attr('src', src);
            $('#lightbox').css('display', 'flex').hide().fadeIn(300);
        });

        $('#lightbox').on('click', function() {
            $('#lightbox').fadeOut(300, function() {
                $('#lightbox-img').attr('src', '');
            });
        });
    });
</script>
@endsection
