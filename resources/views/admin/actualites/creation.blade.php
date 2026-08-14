@extends('layouts.app')

@section('titre')
    {{ isset($actualite) ? 'Modifier l\'Actualité' : 'Créer une Actualité' }}
@endsection

@section('content')
   

    <div class="content">

        <!-- En-tête avec titre et bouton retour -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center text-primary">
                <h3 class="fw-bold">{{ isset($actualite) ? 'Modifier l\'actualité' : 'Créer une nouvelle actualité' }}</h3>
                <a href="{{ route('adminactualite.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left me-1"></i> Retour à la liste
                </a>
            </div>
        </div>

        <!-- Formulaire centré -->
        <div class="row justify-content">
            <div class="col-lg-12">
                <div class="block block-rounded shadow-sm">
                    <div class="block-content block-content-full">

                        <form id="formActualite"
                            action="{{ isset($actualite) ? route('adminactualite.update', $actualite->id) : route('adminactualite.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($actualite))
                                @method('PUT')
                            @endif

                            <!-- Titre -->
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="titre" class="form-label">Titre</label>
                                    <input type="text" name="titre" class="form-control" id="titre"
                                        value="{{ old('titre', $actualite->titre ?? '') }}" required>
                                </div>
                                <!-- Auteur -->
                                <div class="mb-3 col-md-6">
                                    <label for="auteur" class="form-label">Auteur</label>
                                    <input type="text" name="auteur" class="form-control" id="auteur"
                                        value="{{ old('auteur', $actualite->auteur ?? '') }}">
                                </div>
                            </div>
                            <div class="row">

                                <!-- Date de publication -->
                                <div class="mb-3 col-md-12">
                                    <label for="date_publication" class="form-label">Date de publication</label>
                                    <input type="datetime-local" name="date_publication" class="form-control"
                                        id="date_publication"
                                        value="{{ old('date_publication', isset($actualite) ? \Carbon\Carbon::parse($actualite->date_publication)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                                </div>

                                <!-- Image -->
                                
                            </div>
                            <!-- Contenu -->
                            <div class="mb-3">
                                <label for="contenu" class="form-label">Contenu</label>
                                <textarea name="contenu" class="form-control" id="contenu" rows="5" required>{{ old('contenu', $actualite->contenu ?? '') }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/*">
                                    <div id="preview-container" class="mt-3 text-center">
                                        @if (isset($actualite) && $actualite->image)
                                            <img src="{{ get_image_url($actualite->image) }}"
                                                class="img-fluid mt-3 rounded shadow" style="max-height:250px;">
                                        @else
                                            <i class="fa fa-image fa-3x text-muted"></i>
                                        @endif
                                    </div>
                                </div>




                            <!-- Bouton enregistrer / mettre à jour -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn {{ isset($actualite) ? 'btn-success' : 'btn-primary' }}">
                                    {{ isset($actualite) ? 'Mettre à jour' : 'Enregistrer' }}
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

            // Prévisualisation de l'image
            $('#image').on('change', function() {
                let input = this;
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-container').html('<img src="' + e.target.result +
                            '" class="img-fluid mt-3 rounded shadow" style="max-height:250px;">');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Soumission AJAX avec SweetAlert
            $('#formActualite').submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST', // Laravel gère @method('PUT') pour l'édition
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succès',
                            text: '{{ isset($actualite) ? 'Actualité mise à jour' : 'Actualité enregistrée' }} avec succès !',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        $('#formActualite')[0].reset();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        let message = 'Une erreur est survenue.';
                        if (errors) {
                            message = Object.values(errors).join('\n');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: message
                        });
                    }
                });
            });

        });
    </script>
@endsection
