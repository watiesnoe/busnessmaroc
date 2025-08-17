@extends('layoutsite.site')

@section('titre', $universite->nom)

@section('content')
    <div class="container py-5">

        <!-- Titre + logo -->
        <div class="text-center mb-4">
            @if($universite->logo)
                <img src="{{ asset('storage/' . $universite->logo) }}"
                     alt="{{ $universite->nom }}"
                     class="rounded-circle mb-3 shadow-sm border border-3"
                     style="border-color: #ff6600; width:120px; height:120px; object-fit:cover;">
            @endif
            <h1 class="fw-bold" style="color: #ff6600;">{{ $universite->nom }}</h1>
            <p class="text-muted">{{ $universite->ville }}, {{ $universite->pays }}</p>
        </div>

        <!-- Description -->
        @if($universite->description)
            <div class="mb-4">
                <h4 style="color: #ff6600;">Présentation</h4>
                <p>{{ $universite->description }}</p>
            </div>
        @endif

        <!-- Infos de contact -->
        <div class="mb-4">
            <h4 style="color: #ff6600;">Informations de contact</h4>
            <ul class="list-unstyled">
                @if($universite->adresse)
                    <li><i class="bi bi-geo-alt" style="color: #ff6600;"></i> {{ $universite->adresse }}</li>
                @endif
                @if($universite->email)
                    <li><i class="bi bi-envelope" style="color: #ff6600;"></i> {{ $universite->email }}</li>
                @endif
                @if($universite->telephone)
                    <li><i class="bi bi-telephone" style="color: #ff6600;"></i> {{ $universite->telephone }}</li>
                @endif
            </ul>
        </div>

        <!-- Photos -->
        @if($universite->photos->count())
            <div class="mb-5">
                <h4 style="color: #ff6600;">Galerie</h4>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($universite->photos as $photo)
                        <img src="{{ asset('storage/' . $photo->photo) }}"
                             alt="Photo {{ $universite->nom }}"
                             class="rounded-3 shadow-sm border border-2 universite-photo"
                             style="border-color: #ff6600; width:150px; height:150px; object-fit:cover; cursor:pointer;">
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Filières -->
        @if($universite->filieres->count())
            <div>
                <h4 style="color: #ff6600;">Filières proposées</h4>
                <div class="row g-3">
                    @foreach($universite->filieres as $filiere)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0"
                                 style="background-color: #FFE0B2; border-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="fw-bold" style="color: #BF360C;">{{ $filiere->nom }}</h5>
                                    <p style="color: #5D4037;">{{ $filiere->description ?? 'Aucune description disponible' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

    <!-- Lightbox HTML -->
    <div id="lightbox" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1050; cursor:pointer;">
        <img id="lightbox-img" src="" alt="Agrandie" style="max-width:90%; max-height:90%; border-radius:8px; box-shadow:0 0 15px #fff;">
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
