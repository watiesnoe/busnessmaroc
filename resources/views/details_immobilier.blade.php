    @extends('layoutsite.site')
    @section('content')
        <div class="container">
            {{-- Infos Maison --}}
            <div class="row mb-4">
                <div class="col-md-8">
                    <h2>{{ $immobilier->titre }}</h2>
                    <p>{{ $immobilier->description }}</p>
                    <p><strong>Ville :</strong> {{ $immobilier->ville }} | <strong>Quartier :</strong> {{ $immobilier->quartier }}</p>
                    <p><strong>Surface :</strong> {{ $immobilier->surface }} m² | <strong>Prix :</strong> {{ number_format($immobilier->prix, 0, ',', ' ') }} FCFA</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$immobilier->photos[0]->url) }}" alt="Maison" class="img-fluid rounded shadow">
                </div>
            </div>

            {{-- Liste des chambres --}}
            <h4>Chambres disponibles</h4>

            <div class="row">
                @foreach($immobilier->chambres as $chambre)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $chambre->image) }}" class="rounded-start m-2" width="200" height="200" alt="Chambre">
                                </div>
                                <div class="col-md-6 p-3">
                                    <h5>{{ $chambre->type }}</h5>
                                    <p><strong>Capacité :</strong> {{ $chambre->capacite }} personnes</p>
                                    <p>
                                        <strong>Prix :</strong><br>
                                        - Jour : {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA<br>
                                        - Mois : {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA<br>
                                        - Année : {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA
                                    </p>
                                    <p><strong>Statut :</strong>
                                        @if($chambre->statut === 'disponible')
                                            <span class="badge bg-success">Disponible</span>
                                        @else
                                            <span class="badge bg-secondary mt-2">{{ ucfirst($chambre->statut) }}</span>
                                        @endif
                                    </p>
                                    @if($chambre->statut === 'disponible')
                                        <a href="{{ route('reserver.chambre', $chambre->id) }}" class="btn btn-primary mt-2">Réserver</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endsection
