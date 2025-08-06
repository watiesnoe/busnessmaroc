@extends('layouts.app')

@section('titre')
    Détails Immobilier
@endsection

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">🏠 Détails du bien : {{ $immobilier->titre }}</h3>
            </div>
            <div class="block-content">
                <p><strong>Ville :</strong> {{ $immobilier->ville }}</p>
                <p><strong>Quartier :</strong> {{ $immobilier->quartier ?? 'N/A' }}</p>
                <p><strong>Surface :</strong> {{ $immobilier->surface }} m²</p>
                <p><strong>Prix :</strong> {{ number_format($immobilier->prix, 0, ',', ' ') }} FCFA</p>
                <p><strong>Statut :</strong> {{ ucfirst($immobilier->statut) }}</p>
                <p><strong>Catégorie :</strong> {{ $immobilier->category->nom ?? '-' }}</p>
                <p><strong>Description :</strong> {{ $immobilier->description }}</p>
            </div>
        </div>

        <!-- Liste des occupants -->
        <div class="block block-rounded mt-4">
            <div class="block-header block-header-default">
                <h3 class="block-title">👥 Occupants</h3>
            </div>
            <div class="block-content">
                @if($immobilier->occupants->isEmpty())
                    <p class="text-muted">Aucun occupant pour cette maison.</p>
                @else
                    <ul class="list-group">
                        @foreach ($immobilier->occupants->unique('id') as $occupant)
                            <li class="list-group-item">
                                {{ $occupant->prenom ?? '' }} {{ $occupant->nom ?? '' }}
                                <br><small class="text-muted">{{ $occupant->email }}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <!-- Liste des chambres -->
        <div class="block block-rounded mt-4">
            <div class="block-header block-header-default">
                <h3 class="block-title">🛏️ Chambres</h3>
            </div>
            <div class="block-content">
                @if($immobilier->chambres->isEmpty())
                    <p class="text-muted">Aucune chambre disponible.</p>
                @else
                    @foreach ($immobilier->chambres as $chambre)
                        <div class="border rounded p-3 mb-3">
                            <h5>Type : {{ $chambre->type }}
                                <small class="badge
                                    @if($chambre->statut == 'disponible') bg-success
                                    @elseif($chambre->statut == 'reservee') bg-warning
                                    @elseif($chambre->statut == 'occupee') bg-danger
                                    @else bg-secondary @endif
                                ">
                                    {{ ucfirst($chambre->statut) }}
                                </small>
                            </h5>
                            <p>Prix/mois : {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA</p>
                            <p>Capacité : {{ $chambre->capacite }}</p>
                            <p>Description : {{ $chambre->description ?? '-' }}</p>

                            <!-- Contrats liés à cette chambre -->
                            <h6>Contrats pour cette chambre :</h6>
                            @php
                                $contrats = $immobilier->contratLocations->where('chambre_id', $chambre->id);
                            @endphp
                            @if($contrats->isEmpty())
                                <p class="text-muted">Aucun contrat pour cette chambre.</p>
                            @else
                                @foreach ($contrats as $contrat)
                                    <div class="border rounded p-2 mb-2">
                                        <p><strong>Client :</strong> {{ $contrat->user->prenom ?? '-' }} {{ $contrat->user->nom ?? '-' }}</p>
                                        <p><strong>Début :</strong> {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }}</p>
                                        <p><strong>Fin :</strong> {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}</p>
                                        <p><strong>Type contrat :</strong> {{ ucfirst($contrat->type_contrat) }}</p>
                                        <p><strong>Prix total :</strong> {{ number_format($contrat->prix_total, 0, ',', ' ') }} FCFA</p>
                                        <p><strong>Statut :</strong> {{ ucfirst($contrat->statut) }}</p>
                                        <p><strong>Conditions :</strong> {{ $contrat->conditions_particulieres ?? '-' }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
