@extends('layoutsite.site')
@section('titre')
    Université
@endsection
@section('content')
    <div class="container py-5">
        <h1 class="mb-5 text-center fw-bold">Nos Universités</h1>

        <div class="row g-4">
            @foreach($universites as $universite)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm rounded-4 overflow-hidden h-100 border-0"
                         style="background-color: #fff3e0; transition: box-shadow 0.3s ease;">
                        {{-- Logo --}}
                        @if($universite->logo)
                            <div class="d-flex justify-content-center align-items-center" style="height: 180px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $universite->logo) }}"
                                     alt="Logo {{ $universite->nom }}"
                                     style="max-height: 200px; max-width: 200px; object-fit: contain; transition: transform 0.3s ease; cursor: pointer;"
                                     onmouseover="this.style.transform='scale(1.05)'"
                                     onmouseout="this.style.transform='scale(1)'">
                            </div>

                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center text-white" style="height:180px;">
                                <i class="bi bi-building fs-2"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold" style="color:#ff6600;">{{ $universite->nom }}</h5>
                            <p class="text-muted small mb-3" style="min-height: 72px;">{{ Str::limit($universite->description, 130) }}</p>

                            @if($universite->filieres->count())
                                <div class="mb-3">
                                    <h6 class="fw-semibold mb-2" style="color:#ff6600;">Filières</h6>
                                    <ul class="list-unstyled small">
                                        @foreach($universite->filieres as $filiere)
                                            <li class="d-flex align-items-center mb-1">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>{{ $filiere->nom }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if($universite->photos->count())
                                <div class="d-flex flex-wrap gap-2 mb-3 mt-auto">
                                    @foreach($universite->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo->photo) }}"
                                             alt="Photo {{ $universite->nom }}"
                                             class="rounded-3"
                                             style="width:48px; height:48px; object-fit: cover; box-shadow: 0 0 4px rgba(0,0,0,0.1);">
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{ route('universite.detaille', $universite->id) }}"
                               class="btn btn-primary btn-sm mt-auto align-self-start">
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
