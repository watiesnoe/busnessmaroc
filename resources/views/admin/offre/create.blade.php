@extends('layouts.app')
@section('titre')
    Offre d'emploi / stage
@endsection

@section('content')
    <div class="content">
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('offre.index') }}" class="btn btn-primary">Voir la liste</a>
        </div>

        <form id="createform" method="POST"
              action="{{ isset($offre) ? route('offre.update', $offre->id) : route('offre.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($offre))
                @method('PUT')
            @endif

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light text-primary fw-semibold bg-primary">
                    <h5 class="mb-0 text-white">🎯 {{ isset($offre) ? 'Modifier' : 'Publier' }} une offre d'emploi ou de stage</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <!-- Titre de l'offre -->
                        <div class="col-md-4">
                            <label class="form-label">Titre de l'offre</label>
                            <input type="text" name="titre" class="form-control shadow-sm"
                                   placeholder="Ex : Développeur Web"
                                   value="{{ $offre->titre ?? '' }}" required>
                        </div>

                        <!-- Type d'offre -->
                        <div class="col-md-4">
                            <label class="form-label">Type d'offre</label>
                            <select name="type_offre" id="type_offre" class="form-select shadow-sm" required>
                                <option value="">-- Choisir le type --</option>
                                <option value="emploi" {{ isset($offre) && $offre->type_offre=='emploi' ? 'selected' : '' }}>Emploi</option>
                                <option value="stage" {{ isset($offre) && $offre->type_offre=='stage' ? 'selected' : '' }}>Stage</option>
                            </select>
                        </div>

                        <!-- Date de publication -->
                        <div class="col-md-4">
                            <label class="form-label">Date de publication</label>
                            <input type="date" name="date_publication" class="form-control shadow-sm"
                                   value="{{ isset($offre) ? \Carbon\Carbon::parse($offre->date_publication)->format('Y-m-d') : '' }}" required>
                        </div>

                        <!-- Nom de l'entreprise -->
                        <div class="col-md-4">
                            <label class="form-label">Entreprise</label>
                            <input type="text" name="entreprise" class="form-control shadow-sm"
                                   placeholder="Ex : Orange Mali"
                                   value="{{ $offre->entreprise ?? '' }}" required>
                        </div>

                        <!-- Lieu -->
                        <div class="col-md-4">
                            <label class="form-label">Lieu</label>
                            <input type="text" name="lieu" class="form-control shadow-sm"
                                   placeholder="Ex : Bamako"
                                   value="{{ $offre->lieu ?? '' }}" required>
                        </div>

                        <!-- Secteur d'activité -->
                        <div class="col-md-4">
                            <label class="form-label">Secteur d'activité</label>
                            <select name="secteur" class="form-select shadow-sm" required>
                                <option value="">-- Sélectionner un secteur --</option>
                                @foreach(['Informatique','Télécommunication','Finance','Éducation','Santé'] as $secteur)
                                    <option value="{{ $secteur }}" {{ isset($offre) && $offre->secteur==$secteur ? 'selected' : '' }}>{{ $secteur }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Niveau d'étude -->
                        <div class="col-md-4">
                            <label class="form-label">Niveau d'étude requis</label>
                            <select name="niveau" class="form-select shadow-sm" required>
                                <option value="">-- Sélectionner --</option>
                                @foreach(['BAC','BAC+2','BAC+3','BAC+5'] as $niveau)
                                    <option value="{{ $niveau }}" {{ isset($offre) && $offre->niveau==$niveau ? 'selected' : '' }}>{{ $niveau }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date limite -->
                        <div class="col-md-4">
                            <label class="form-label">Date limite</label>
                            <input type="date" name="date_limite" class="form-control shadow-sm"
                                   value="{{ isset($offre) ? \Carbon\Carbon::parse($offre->date_limite)->format('Y-m-d') : '' }}" required>
                        </div>

                        <!-- Salaire proposé -->
                        <div class="col-md-4" id="salaire_field"
                             style="display: {{ isset($offre) && ($offre->type_offre=='emploi' || $offre->type_offre=='stage') ? 'block' : 'block' }};">
                            <label class="form-label">Salaire proposé (en FCFA)</label>
                            <input type="number" name="salaire" class="form-control shadow-sm"
                                   value="{{ $offre->salaire ?? '' }}" placeholder="Ex : 150000" min="0">
                        </div>

                        <!-- Mode de candidature -->
                        <div class="col-md-4">
                            <label class="form-label">Mode de candidature</label>
                            <select name="mode_candidature" class="form-select shadow-sm" required>
                                <option value="">-- Choisir le mode --</option>
                                <option value="interne" {{ isset($offre) && $offre->mode_candidature=='interne' ? 'selected' : '' }}>Interne</option>
                                <option value="externe" {{ isset($offre) && $offre->mode_candidature=='externe' ? 'selected' : '' }}>Externe</option>
                            </select>
                        </div>

                        <!-- Lien ou adresse -->
                        <div class="col-md-8">
                            <label class="form-label">Lien ou adresse de candidature</label>
                            <input type="text" name="lien_candidature" class="form-control shadow-sm"
                                   value="{{ $offre->lien_candidature ?? '' }}"
                                   placeholder="Ex : https://recrutement.exemple.com ou contact@exemple.com" required>
                        </div>

                        <!-- Profil recherché -->
                        <div class="col-md-12">
                            <label class="form-label">Profil recherché</label>
                            <textarea name="profil_recherche" rows="4" class="form-control shadow-sm" required>{{ $offre->profil_recherche ?? '' }}</textarea>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label">Description du poste</label>
                            <textarea name="description" rows="5" class="form-control shadow-sm" required>{{ $offre->description ?? '' }}</textarea>
                        </div>

                        <!-- Boutons -->
                        <div class="col-md-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow">{{ isset($offre) ? 'Mettre à jour' : 'Publier' }}</button>
                            <a href="{{ route('offre.index') }}" class="btn btn-info px-4 py-2 shadow">Voir la liste</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // Affiche le salaire pour tous les types d'offres
        document.getElementById('type_offre').addEventListener('change', function () {
            const salaireField = document.getElementById('salaire_field');
            salaireField.style.display = 'block';
        });
    </script>
@endsection
