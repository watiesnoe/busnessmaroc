@extends('layoutsite.site')

@section('titre', $universite->nom)

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

    {{-- <div class="container py-5">

        <!-- Titre + logo -->
        <div class="text-center mb-4">
            @if ($universite->logo)
                <img src="{{ asset('storage/' . $universite->logo) }}" alt="{{ $universite->nom }}"
                    class="rounded-circle mb-3 shadow-sm border border-3"
                    style="border-color: #ff6600; width:120px; height:120px; object-fit:cover;">
            @endif
            <h1 class="fw-bold" style="color: #ff6600;">{{ $universite->nom }}</h1>
            <p class="text-muted">{{ $universite->ville }}, {{ $universite->pays }}</p>
        </div>

        <!-- Description -->
        @if ($universite->description)
            <div class="mb-4">
                <h4 style="color: #ff6600;">Présentation</h4>
                <p>{{ $universite->description }}</p>
            </div>
        @endif

        <!-- Infos de contact -->
        <div class="mb-4">
            <h4 style="color: #ff6600;">Informations de contact</h4>
            <ul class="list-unstyled">
                @if ($universite->adresse)
                    <li><i class="bi bi-geo-alt" style="color: #ff6600;"></i> {{ $universite->adresse }}</li>
                @endif
                @if ($universite->email)
                    <li><i class="bi bi-envelope" style="color: #ff6600;"></i> {{ $universite->email }}</li>
                @endif
                @if ($universite->telephone)
                    <li><i class="bi bi-telephone" style="color: #ff6600;"></i> {{ $universite->telephone }}</li>
                @endif
            </ul>
        </div>

        <!-- Photos -->
        @if ($universite->photos->count())
            <div class="mb-5">
                <h4 style="color: #ff6600;">Galerie</h4>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($universite->photos as $photo)
                        <img src="{{ asset('storage/' . $photo->photo) }}" alt="Photo {{ $universite->nom }}"
                            class="rounded-3 shadow-sm border border-2 universite-photo"
                            style="border-color: #ff6600; width:150px; height:150px; object-fit:cover; cursor:pointer;">
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Filières -->
        @if ($universite->filieres->count())
            <div>
                <h4 style="color: #ff6600;">Filières proposées</h4>
                <div class="row g-3">
                    @foreach ($universite->filieres as $filiere)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0"
                                style="background-color: #FFE0B2; border-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="fw-bold" style="color: #BF360C;">{{ $filiere->nom }}</h5>
                                    <p style="color: #5D4037;">
                                        {{ $filiere->description ?? 'Aucune description disponible' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div> --}}
    <div class="container py-5">

    <!-- Titre + logo -->
    <div class="text-center mb-5">
        @if ($universite->logo)
            <img src="{{ asset('storage/' . $universite->logo) }}" alt="{{ $universite->nom }}"
                class="rounded-circle mb-3 shadow-sm border border-3"
                style="border-color: #d50100; width:130px; height:130px; object-fit:cover;">
        @endif
        <h1 class="fw-bold mb-2" style="color: #d50100;">{{ $universite->nom }}</h1>
        <p class="text-muted fst-italic">{{ $universite->ville }}, {{ $universite->pays }}</p>
    </div>

    <!-- Description -->
    @if ($universite->description)
        <div class="mb-5 p-4 bg-light rounded-4 shadow-sm">
            <h4 class="fw-semibold mb-3" style="color: #d50100;">Présentation</h4>
            <p class="mb-0" style="line-height: 1.6;">{{ $universite->description }}</p>
        </div>
    @endif

    <!-- Infos de contact -->
    <div class="mb-5 p-4 bg-light rounded-4 shadow-sm">
        <h4 class="fw-semibold mb-3" style="color: #d50100;">Informations de contact</h4>
        <ul class="list-unstyled mb-0">
            @if ($universite->adresse)
                <li class="mb-2"><i class="bi bi-geo-alt me-2" style="color: #d50100;"></i>{{ $universite->adresse }}</li>
            @endif
            @if ($universite->email)
                <li class="mb-2"><i class="bi bi-envelope me-2" style="color: #d50100;"></i>{{ $universite->email }}</li>
            @endif
            @if ($universite->telephone)
                <li class="mb-2"><i class="bi bi-telephone me-2" style="color: #d50100;"></i>{{ $universite->telephone }}</li>
            @endif
        </ul>
    </div>

    <!-- Galerie -->
    @if ($universite->photos->count())
        <div class="mb-5">
            <h4 class="fw-semibold mb-3" style="color: #d50100;">Galerie</h4>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                @foreach ($universite->photos as $photo)
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $photo->photo) }}" alt="Photo {{ $universite->nom }}"
                            class="rounded-4 shadow-sm universite-photo"
                            style="width:160px; height:160px; object-fit:cover; cursor:pointer; transition: transform 0.3s;">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Filières -->
    @if ($universite->filieres->count())
        <div>
            <h4 class="fw-semibold mb-4" style="color: #d50100;">Filières proposées</h4>
            <div class="row g-4">
                @foreach ($universite->filieres as $filiere)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0" style="background-color: #feddd4; border-radius: 15px; transition: transform 0.3s;">
                            <div class="card-body">
                                <h5 class="fw-bold mb-2" style="color: #BF360C;">{{ $filiere->nom }}</h5>
                                <p class="mb-0" style="color: #5D4037;">
                                    {{ $filiere->description ?? 'Aucune description disponible' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>

<!-- Effets hover -->
<style>
.universite-photo:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
</style>


    <!-- Lightbox HTML -->
    <div id="lightbox"
        style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1050; cursor:pointer;">
        <img id="lightbox-img" src="" alt="Agrandie"
            style="max-width:90%; max-height:90%; border-radius:8px; box-shadow:0 0 15px #fff;">
    </div>
@endsection

@section('scripts')
    <!-- jQuery (si pas déjà inclus dans ton layout) -->
    <script>
        $(document).ready(function() {
            $('.universite-photo').on('click', function() {
                var src = $(this).attr('src');
                $('#lightbox-img').attr('src', src);
                $('#lightbox').fadeIn();
            });

            $('#lightbox').on('click', function() {
                $('#lightbox').fadeOut(function() {
                    $('#lightbox-img').attr('src', '');
                });
            });
        });
    </script>
@endsection
