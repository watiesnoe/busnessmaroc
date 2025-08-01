    @extends('layoutsite.site')

    @section('content')
        <section class="section-box-2 d-flex align-items-center position-relative text-white"
            style="height: 400px;
                background-image: url('{{ asset('asset/imgs/bg-job.jpg') }}');
                background-size: 800px auto;
                background-repeat: no-repeat;
                background-position: center;">

            <!-- Overlay sombre -->
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
            </div>

            <!-- Contenu centré -->
            <div class="container position-relative" style="z-index: 2;">
                <div class="p-4 text-center offre-card-content">
                    <div class="mb-3">
                        <span class="badge badge-custom bg-warning text-dark">🔥 22 Offres disponibles</span>
                    </div>
                    <h2 class="offre-card-title fw-bold fs-2">Trouvez votre prochain emploi de rêve</h2>
                    <p class="lead mt-2">Explorez les meilleures opportunités de carrière près de chez vous ou à distance.
                    </p>
                </div>
            </div>
        </section>

        <div class="bg-light py-5">
            <div class="container">
                {{-- Infos Maison dans une carte --}}
                <div class="card bg-white shadow-sm rounded-4 p-4 mb-5">
                    <div class="row align-items-center">
                        {{-- Infos texte --}}
                        <div class="col-md-8 mb-3 mb-md-0">
                            <h2 class="fw-bold text-primary">{{ $immobilier->titre }}</h2>
                            <p class="text-muted fs-6">{{ $immobilier->description }}</p>

                            <p class="mb-1">
                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                <strong>Ville :</strong> {{ $immobilier->ville }} |
                                <strong>Quartier :</strong> {{ $immobilier->quartier }}
                            </p>

                            <p class="mb-1">
                                <i class="bi bi-aspect-ratio text-info"></i>
                                <strong>Surface :</strong> {{ $immobilier->surface }} m² |
                                <i class="bi bi-cash-coin text-success"></i>
                                <strong>Prix :</strong> {{ number_format($immobilier->prix, 0, ',', ' ') }} FCFA
                            </p>
                        </div>

                        {{-- Image principale maison avec taille fixe --}}
                        <div class="col-md-4 text-center">
                            @php
                                $photoPrincipale = $immobilier->photos->where('principale', true)->first();
                                $photoAffichee = $photoPrincipale
                                    ? $photoPrincipale->url
                                    : $immobilier->photos->first()->url ?? null;
                            @endphp

                            <img src="{{ asset('storage/' . ($photoAffichee ?? 'images/no-image.png')) }}" alt="Maison"
                                class="rounded-4 shadow w-100" style="object-fit: cover; height: 250px; width: 100%;">
                        </div>
                    </div>
                </div>

                {{-- Liste des chambres --}}
                <h4 class="fw-semibold text-secondary mb-4">Chambres disponibles</h4>
                <div class="row">
                    @foreach ($immobilier->chambres as $chambre)
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white">
                                <div class="row g-0">
                                    {{-- Image chambre avec taille fixe --}}
                                    <div class="col-md-5">
                                        <img src="{{ asset('storage/' . $chambre->image) }}" alt="Chambre" class="w-100"
                                            style="height: 200px; object-fit: cover;">
                                    </div>

                                    {{-- Infos chambre dans la carte --}}
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="p-3 w-100">
                                            <h5 class="text-primary">{{ $chambre->type }}</h5>
                                            <p class="mb-1"><strong>Capacité :</strong> {{ $chambre->capacite }}
                                                personnes</p>
                                            <p class="mb-2">
                                                <strong>Prix :</strong><br>
                                                <span class="text-success">Jour :</span>
                                                {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA<br>
                                                <span class="text-success">Mois :</span>
                                                {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA<br>
                                                <span class="text-success">Année :</span>
                                                {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA
                                            </p>
                                            <p><strong>Statut :</strong>
                                                @if ($chambre->statut === 'disponible')
                                                    <span class="badge bg-success">Disponible</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($chambre->statut) }}</span>
                                                @endif
                                            </p>

                                            @if ($chambre->statut === 'disponible')
                                                <a href="{{ route('reservation.chambre', $chambre->id) }}"
                                                    class="btn btn-outline-primary w-100 mt-2">Réserver</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
