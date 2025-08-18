@extends('layouts.app')
@section('titre')
    Détails de l'offre
@endsection

@section('content')
    <div class="content">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h3>Détails de l'offre</h3>
            <a href="{{ route('offre.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>

        <div class="card shadow-sm border-0 rounded-4 mb-5">
            <div class="card-header bg-primary text-white fw-semibold">
                <h5 class="mb-0">{{ $offre->titre }}</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <strong>Type d'offre :</strong> {{ ucfirst($offre->type_offre) }}
                    </div>
                    <div class="col-md-4">
                        <strong>Date de publication :</strong> {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}
                    </div>
                    <div class="col-md-4">
                        <strong>Date limite :</strong> {{ \Carbon\Carbon::parse($offre->date_limite)->format('d/m/Y') }}
                    </div>

                    <div class="col-md-4">
                        <strong>Entreprise :</strong> {{ $offre->entreprise }}
                    </div>
                    <div class="col-md-4">
                        <strong>Lieu :</strong> {{ $offre->lieu }}
                    </div>
                    <div class="col-md-4">
                        <strong>Secteur :</strong> {{ $offre->secteur }}
                    </div>

                    <div class="col-md-4">
                        <strong>Niveau d'étude requis :</strong> {{ $offre->niveau }}
                    </div>
                    <div class="col-md-4">
                        <strong>Salaire proposé :</strong> {{ $offre->salaire ? number_format($offre->salaire,0,'',' ') . ' FCFA' : 'Non précisé' }}
                    </div>
                    <div class="col-md-4">
                        <strong>Mode de candidature :</strong> {{ ucfirst($offre->mode_candidature) }}
                    </div>

                    <div class="col-md-12">
                        <strong>Lien ou adresse de candidature :</strong>
                        {{ $offre->lien_candidature ?? 'Non précisé' }}
                    </div>

                    <div class="col-md-12">
                        <strong>Profil recherché :</strong>
                        <p>{{ $offre->profil_recherche }}</p>
                    </div>

                    <div class="col-md-12">
                        <strong>Description du poste :</strong>
                        <p>{{ $offre->description }}</p>
                    </div>

                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('offre.edit', $offre->id) }}" class="btn btn-warning">Modifier</a>
                <a href="{{ route('offre.index') }}" class="btn btn-info">Retour</a>
            </div>
        </div>
    </div>
@endsection
