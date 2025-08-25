@extends('layoutsite.site')
@section('titre')
    Université
@endsection
@section('content')
    <section class="hero-section position-relative text-white"
        style="background-image: url('{{ asset('asset/imgs/Université.png') }}'); 
           background-size: cover; 
           background-position: center; 
           height: 400px;">

        <!-- Overlay léger pour améliorer la visibilité de l'image -->
        <div class="overlay position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.3); top: 0; left: 0;">
        </div>

        <div class="container position-relative z-2 h-100 d-flex flex-column justify-content-center">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="display-4 fw-bold mb-4 wow animate__animated animate__fadeInDown">
                        <span style="color: #d50100;">Rejoignez</span> votre futur <br class="d-none d-md-block"> université
                        en
                        quelques clics
                    </h1>
                    <p class="lead mb-5 wow animate__animated animate__fadeInUp"
                        style="color: #fff; text-shadow: 1px 1px 6px rgba(0,0,0,0.6);">
                        Découvrez les meilleures universités, programmes et opportunités académiques pour construire votre
                        avenir
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Partie contenu --}}
    <div class="container py-5">
        <h1 class="mb-2 text-center fw-bold" style="color: #d50100;">Nos Universités</h1>
        <p class="text-center text-muted mb-5">Découvrez nos établissements partenaires et leurs filières</p>

        <div class="row g-5">
            @foreach ($universites as $universite)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm rounded-4 overflow-hidden h-100 border-0"
                        style="background-color: #feddd4; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0 4px rgba(0,0,0,0.1)'">

                        {{-- Logo --}}
                        @if ($universite->logo)
                            <div class="d-flex justify-content-center align-items-center"
                                style="height: 180px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $universite->logo) }}" alt="Logo {{ $universite->nom }}"
                                    style="max-height: 200px; max-width: 200px; object-fit: contain; transition: transform 0.3s ease; cursor: pointer;"
                                    onmouseover="this.style.transform='scale(1.05)'"
                                    onmouseout="this.style.transform='scale(1)'">
                            </div>
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center text-white"
                                style="height:180px;">
                                <i class="bi bi-building fs-2"></i>
                            </div>
                        @endif

                        {{-- Contenu de la carte --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold mb-2" style="color:#d50100;">{{ $universite->nom }}</h5>
                            <p class="text-muted small mb-3" style="min-height: 72px;">
                                {{ Str::limit($universite->description, 130) }}
                            </p>

                            {{-- Filières --}}
                            @if ($universite->filieres->count())
                                <div class="mb-3">
                                    <h6 class="fw-semibold mb-2" style="color:#d50100;">Filières</h6>
                                    <ul class="list-unstyled small">
                                        @foreach ($universite->filieres as $filiere)
                                            <li class="d-flex align-items-center mb-1">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>{{ $filiere->nom }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Photos miniatures --}}
                            @if ($universite->photos->count())
                                <div class="d-flex flex-wrap gap-2 mb-3 mt-auto">
                                    @foreach ($universite->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo->photo) }}"
                                            alt="Photo {{ $universite->nom }}" class="rounded-3"
                                            style="width:48px; height:48px; object-fit: cover; box-shadow: 0 0 4px rgba(0,0,0,0.1);">
                                    @endforeach
                                </div>
                            @endif

                            {{-- Bouton Voir détails --}}
                            <a href="{{ route('universite.detaille', $universite->id) }}" class="btn"
                                style="background-color: #d50100; color: white; font-weight: 500; transition: background 0.3s ease;"
                                onmouseover="this.style.backgroundColor='#d50100'"
                                onmouseout="this.style.backgroundColor='#d50100'">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <style>
        /* Effet hover léger orange */
        .card:hover {
            box-shadow: 0 0 15px 3px rgba(255, 102, 0, 0.4);
            background-color: #ffe8cc;
        }
    </style>
@endsection
