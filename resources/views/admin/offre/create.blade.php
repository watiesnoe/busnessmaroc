@extends('layouts.app')
@section('titre')
    Chambre
@endsection
@section('content')
    <div class="content">
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('offre.index') }}" class="btn btn-primary">Voir la liste</a>
        </div>

        @php
            $isEdit = isset($offre);
            $formAction = $isEdit ? route('offre.update', $offre->id) : route('offre.store');
        @endphp

        <form id="createformOffre" action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white fw-semibold">
                    <h5 class="mb-0">
                        🎯 {{ $isEdit ? 'Modifier l\'offre' : 'Publier une offre d\'emploi ou de stage' }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">

                        <!-- Titre -->
                        <div class="col-md-4">
                            <label class="form-label">Titre de l'offre</label>
                            <input type="text" name="titre" class="form-control shadow-sm"
                                   placeholder="Ex : Développeur Web"
                                   value="{{ old('titre', $offre->titre ?? '') }}" required>
                        </div>

                        <!-- Type -->
                        <div class="col-md-4">
                            <label class="form-label">Type d'offre</label>
                            <select name="type_offre" id="type_offre" class="form-select shadow-sm" required>
                                <option value="">-- Choisir le type --</option>
                                <option value="emploi" {{ (old('type_offre', $offre->type_offre ?? '') == 'emploi') ? 'selected' : '' }}>Emploi</option>
                                <option value="stage" {{ (old('type_offre', $offre->type_offre ?? '') == 'stage') ? 'selected' : '' }}>Stage</option>
                            </select>
                        </div>

                        <!-- Date publication -->
                        <div class="col-md-4">
                            <label class="form-label">Date de publication</label>
                            <input type="date" name="date_publication" class="form-control shadow-sm"
                                   value="{{ old('date_publication', isset($offre->date_publication) ? \Carbon\Carbon::parse($offre->date_publication)->format('Y-m-d') : '') }}"
                                   required>
                        </div>

                        <!-- Entreprise -->
                        <div class="col-md-4">
                            <label class="form-label">Entreprise</label>
                            <input type="text" name="entreprise" class="form-control shadow-sm"
                                   placeholder="Ex : Orange Mali"
                                   value="{{ old('entreprise', $offre->entreprise ?? '') }}" required>
                        </div>

                        <!-- Lieu -->
                        <div class="col-md-4">
                            <label class="form-label">Lieu</label>
                            <input type="text" name="lieu" class="form-control shadow-sm"
                                   placeholder="Ex : Bamako"
                                   value="{{ old('lieu', $offre->lieu ?? '') }}" required>
                        </div>

                        <!-- Secteur -->
                        <div class="col-md-4">
                            <label class="form-label">Secteur d'activité</label>
                            <select name="secteur" class="form-select shadow-sm" required>
                                @php
                                    $secteurs = ['Informatique','Télécommunication','Finance','Éducation','Santé'];
                                    $selectedSecteur = old('secteur', $offre->secteur ?? '');
                                @endphp
                                <option value="">-- Sélectionner un secteur --</option>
                                @foreach($secteurs as $secteur)
                                    <option value="{{ $secteur }}" {{ $selectedSecteur == $secteur ? 'selected' : '' }}>{{ $secteur }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Niveau -->
                        <div class="col-md-4">
                            <label class="form-label">Niveau d'étude requis</label>
                            <select name="niveau" class="form-select shadow-sm" required>
                                @php
                                    $niveaux = ['BAC','BAC+2','BAC+3','BAC+5'];
                                    $selectedNiveau = old('niveau', $offre->niveau ?? '');
                                @endphp
                                <option value="">-- Sélectionner --</option>
                                @foreach($niveaux as $niveau)
                                    <option value="{{ $niveau }}" {{ $selectedNiveau == $niveau ? 'selected' : '' }}>{{ $niveau }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date limite -->
                        <div class="col-md-4">
                            <label class="form-label">Date limite</label>
                            <input type="date" name="date_limite" class="form-control shadow-sm"
                                   value="{{ old('date_limite', isset($offre->date_limite) ? \Carbon\Carbon::parse($offre->date_limite)->format('Y-m-d') : '') }}"
                                   required>
                        </div>

                        <!-- Salaire -->
                        <div class="col-md-4">
                            <label class="form-label">Salaire proposé (en FCFA)</label>
                            <input type="number" name="salaire" class="form-control shadow-sm" min="0"
                                   value="{{ old('salaire', $offre->salaire ?? '') }}">
                        </div>

                        <!-- Mode candidature -->
                        <div class="col-md-4">
                            <label class="form-label">Mode de candidature</label>
                            <select name="mode_candidature" class="form-select shadow-sm" required>
                                @php
                                    $modes = ['interne','externe'];
                                    $selectedMode = old('mode_candidature', $offre->mode_candidature ?? '');
                                @endphp
                                <option value="">-- Choisir le mode --</option>
                                @foreach($modes as $mode)
                                    <option value="{{ $mode }}" {{ $selectedMode == $mode ? 'selected' : '' }}>{{ ucfirst($mode) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Lien candidature -->
                        <div class="col-md-8">
                            <label class="form-label">Lien ou adresse de candidature</label>
                            <input type="text" name="lien_candidature" class="form-control shadow-sm"
                                   value="{{ old('lien_candidature', $offre->lien_candidature ?? '') }}">
                        </div>

                        <!-- Profil recherché -->
                        <div class="col-md-12">
                            <label class="form-label">Profil recherché</label>
                            <textarea name="profil_recherche" rows="4" class="form-control shadow-sm" required>{{ old('profil_recherche', $offre->profil_recherche ?? '') }}</textarea>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label class="form-label">Description du poste</label>
                            <textarea name="description" rows="5" class="form-control shadow-sm" required>{{ old('description', $offre->description ?? '') }}</textarea>
                        </div>
                        <!-- Nombre limite de candidats -->
                        <div class="col-md-4">
                            <label class="form-label">Nombre limite de candidats</label>
                            <input type="number" name="nombre_limite_candidats" class="form-control shadow-sm" min="1"
                                   value="{{ old('nombre_limite_candidats', $offre->nombre_limite_candidats ?? '') }}"
                                   placeholder="Ex : 50" required>
                        </div>

                        <!-- Boutons -->
                        <div class="col-md-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow">
                                {{ $isEdit ? 'Mettre à jour' : 'Publier' }}
                            </button>
                            <a href="{{ route('offre.index') }}" class="btn btn-info px-4 py-2 shadow">Voir la liste</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    <script>
        $(document).ready(function() {

            $('#createformOffre').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let method = '{{ $isEdit ? "PUT" : "POST" }}';

                $.ajax({
                    url: url,
                    type: method,
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Succès',
                                text: response.message,
                                confirmButtonText: 'OK'
                            }).then(() => {
                                if (!{{ $isEdit ? 'true' : 'false' }}) form.trigger('reset');
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += value[0] + "\n";
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de validation',
                                text: errorMessages
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: 'Une erreur est survenue. Veuillez réessayer.'
                            });
                        }
                    }
                });

            });
        });
    </script>
@endsection
