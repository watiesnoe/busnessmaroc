@extends('layouts.app')

@section('titre')
    {{ isset($evenement) ? 'Modifier un Événement' : 'Créer un Événement' }}
@endsection

@section('content')
   <div class="content">

    <!-- En-tête avec titre et bouton retour -->
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center text-primary">
            <h3 class="fw-bold">{{ isset($evenement) ? 'Modifier l’événement' : 'Créer un nouvel événement' }}</h3>
            <a href="{{ route('evenements.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Retour à la liste
            </a>
        </div>
    </div>

    <!-- Formulaire centré -->
    <div class="row justify-content">
        <div class="col-lg-12">
            <div class="block block-rounded shadow-sm">
                <div class="block-content">

                    {{-- Messages --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="formEvenement" action="{{ isset($evenement) ? route('evenements.update', $evenement->id) : route('evenements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($evenement))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="titre">Titre</label>
                                <input type="text" name="titre" class="form-control" id="titre" value="{{ old('titre', $evenement->titre ?? '') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="lieu">Lieu</label>
                                <input type="text" name="lieu" class="form-control" id="lieu" value="{{ old('lieu', $evenement->lieu ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="date_debut">Date de début</label>
                                <input type="datetime-local" name="date_debut" class="form-control" id="date_debut" value="{{ old('date_debut', isset($evenement) ? \Carbon\Carbon::parse($evenement->date_debut)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="date_fin">Date de fin</label>
                                <input type="datetime-local" name="date_fin" class="form-control" id="date_fin" value="{{ old('date_fin', isset($evenement) ? \Carbon\Carbon::parse($evenement->date_fin)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" required>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="prix_ticket">Prix du ticket (FCFA)</label>
                            <input type="number" name="prix_ticket" class="form-control" id="prix_ticket" step="0.01"
                                   value="{{ old('prix_ticket', $evenement->prix_ticket ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="nombre_limite_places">Nombre limite de place</label>
                            <input type="number" name="nombre_limite_places" class="form-control" id="nombre_limite_places" min="1"
                                   value="{{ old('nombre_limite_places', $evenement->nombre_limite_places ?? '') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="statut">Statut</label>
                            <select name="statut" id="statut" class="form-control">
                                @php
                                    $statuts = ['à venir', 'terminé', 'annulé'];
                                    $selectedStatut = old('statut', $evenement->statut ?? '');
                                @endphp
                                @foreach($statuts as $statut)
                                    <option value="{{ $statut }}" {{ $selectedStatut == $statut ? 'selected' : '' }}>{{ ucfirst($statut) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="prix_ticket">Prix du ticket (FCFA)</label>
                                <input type="number" name="prix_ticket" class="form-control" id="prix_ticket" step="0.01" value="{{ old('prix_ticket', $evenement->prix_ticket ?? '') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="statut">Statut</label>
                                <select name="statut" id="statut" class="form-control">
                                    @php
                                        $statuts = ['à venir', 'terminé', 'annulé'];
                                        $selectedStatut = old('statut', $evenement->statut ?? '');
                                    @endphp
                                    @foreach ($statuts as $statut)
                                        <option value="{{ $statut }}" {{ $selectedStatut == $statut ? 'selected' : '' }}>{{ ucfirst($statut) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="4" required>{{ old('description', $evenement->description ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="image">Image de l'événement</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/*">
                            <div id="preview-container" class="mt-3 text-center">
                                @if (isset($evenement) && $evenement->image)
                                    <img src="{{ asset('storage/' . $evenement->image) }}" class="img-fluid rounded border p-1" style="max-height:200px;">
                                @else
                                    <i class="fa fa-image fa-3x text-muted"></i>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn {{ isset($evenement) ? 'btn-success' : 'btn-primary' }}">
                                {{ isset($evenement) ? '💾 Mettre à jour l\'événement' : '💾 Enregistrer l\'événement' }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Prévisualisation image
            $('#image').on('change', function() {
                let input = this;
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-container').html('<img src="' + e.target.result +
                            '" class="img-fluid rounded border p-1" style="max-height:200px;">');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Soumission AJAX
            $('#formEvenement').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Succès',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                        $('#formEvenement')[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let messages = Object.values(errors).map(msg => msg[0]).join(
                                '<br>');

                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de validation',
                                html: messages
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
