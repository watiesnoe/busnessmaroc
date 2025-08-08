    @extends('layoutsite.site')

    @section('content')
        <section class="text-white d-flex align-items-center"
        style="background-image: url('{{ asset('asset/imgs/location.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container text-center">
            <div class="container text-center">
                <h3 class="fw-bold mb-3" style="font-size: 2.8rem; color: #f5f5f5;">
                    <span class="text-primary">Trouvez</span> le logement idéal <br class="d-none d-md-block"> pour vous dès
                    aujourd’hui
                </h3>
                <p class="lead mx-auto" style="max-width: 750px; color: #f0f0f0; text-shadow: 1px 1px 4px rgba(0,0,0,0.8);">
                    Explorez une large sélection d’appartements, maisons et studios, soigneusement choisis pour répondre à
                    toutes vos envies.
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
                    @foreach ($immobilier->chambres->where('statut', 'disponible') as $chambre)
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden bg-white">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('storage/' . $chambre->image) }}" alt="Chambre" class="w-100" style="height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="p-3 w-100">
                                            <h5 class="text-primary">{{ $chambre->type }}</h5>
                                            <p class="mb-1"><strong>Capacité :</strong> {{ $chambre->capacite }} personnes</p>
                                            <p class="mb-2">
                                                <strong>Prix :</strong><br>
                                                <span class="text-success">Jour :</span> {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA<br>
                                                <span class="text-success">Mois :</span> {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA<br>
                                                <span class="text-success">Année :</span> {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA
                                            </p>
                                            <p><strong>Statut :</strong> <span class="badge bg-success">Disponible</span></p>
                                            <a href="{{ route('reservation.chambre', $chambre->id) }}" class="btn btn-outline-primary w-100 mt-2">Réserver</a>
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
