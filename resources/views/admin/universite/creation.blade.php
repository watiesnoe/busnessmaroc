@extends('layouts.app')

@section('titre')
    {{ isset($universite) ? 'Modifier l\'Université' : 'Ajouter une Université' }}
@endsection

@section('content')
    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form
            action="{{ isset($universite) ? route('universites.update', $universite->id) : route('universites.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="universiteForm">
            @csrf
            @if(isset($universite))
                @method('PUT')
            @endif

            <!-- input caché pour les photos à supprimer -->
            <input type="hidden" name="photos_to_delete" value="">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light text-white fw-semibold bg-primary">
                    <h2>{{ isset($universite) ? 'Modifier une Université' : 'Ajouter une Université' }}</h2>
                </div>
                <div class="card-body">
                    <div class="row g-4">

                        <!-- Nom -->
                        <div class="col-md-4 mb-3">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" name="nom" class="form-control" required
                                   value="{{ old('nom', $universite->nom ?? '') }}">
                            @error('nom')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Adresse -->
                        <div class="col-md-4 mb-3">
                            <label>Adresse</label>
                            <input type="text" name="adresse" class="form-control"
                                   value="{{ old('adresse', $universite->adresse ?? '') }}">
                            @error('adresse')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Ville -->
                        <div class="col-md-4 mb-3">
                            <label>Ville</label>
                            <input type="text" name="ville" class="form-control"
                                   value="{{ old('ville', $universite->ville ?? '') }}">
                            @error('ville')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Pays -->
                        <div class="col-md-4 mb-3">
                            <label>Pays</label>
                            <input type="text" name="pays" class="form-control"
                                   value="{{ old('pays', $universite->pays ?? '') }}">
                            @error('pays')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-4 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $universite->email ?? '') }}">
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Téléphone -->
                        <div class="col-md-4 mb-3">
                            <label>Téléphone</label>
                            <input type="text" name="telephone" class="form-control"
                                   value="{{ old('telephone', $universite->telephone ?? '') }}">
                            @error('telephone')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Logo -->
                        <div class="col-md-12 mb-3">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if(isset($universite) && $universite->logo)
                                <img src="{{ asset('storage/' . $universite->logo) }}" alt="Logo" style="max-height:100px; margin-top:10px;">
                            @endif
                            @error('logo')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $universite->description ?? '') }}</textarea>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                    </div>

                    <!-- Filières -->
                    <h4>Filières</h4>
                    <div id="filiere-container">
                        @php
                            $filieres = old('filieres', isset($universite) ? $universite->filieres->toArray() : []);
                        @endphp

                        @if(count($filieres) > 0)
                            @foreach($filieres as $index => $filiere)
                                <div class="row filiere-item align-items-center">
                                    <div class="col-md-5 mb-3">
                                        <input type="text" name="filieres[{{ $index }}][nom]" class="form-control" placeholder="Nom de la filière" value="{{ $filiere['nom'] ?? '' }}" required>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <input type="text" name="filieres[{{ $index }}][description]" class="form-control" placeholder="Description" value="{{ $filiere['description'] ?? '' }}">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <button type="button" class="btn btn-danger remove-filiere" {{ count($filieres) === 1 ? 'disabled' : '' }}>X</button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row filiere-item align-items-center">
                                <div class="col-md-5 mb-3">
                                    <input type="text" name="filieres[0][nom]" class="form-control" placeholder="Nom de la filière" required>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <input type="text" name="filieres[0][description]" class="form-control" placeholder="Description">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="button" class="btn btn-danger remove-filiere" disabled>X</button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" id="add-filiere" class="btn btn-primary mb-4">+ Ajouter une filière</button>

                    <!-- Photos multiples -->
                    <div class="mb-3">
                        <label>Photos</label>
                        <input type="file" name="photos[]" class="form-control" multiple accept="image/*">
                        @error('photos.*')<small class="text-danger">{{ $message }}</small>@enderror

                        @if(isset($universite) && $universite->photos->count())
                            <div class="mt-2 d-flex flex-wrap gap-2">
                                @foreach($universite->photos as $photo)
                                    <div class="position-relative" style="width: 80px; height: 80px; margin-right: 8px;">
                                        <img src="{{ asset('storage/' . $photo->photo) }}" alt="Photo" style="height:80px; object-fit:cover; border-radius:4px;">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-photo-btn"
                                                data-photo-id="{{ $photo->id }}" style="padding: 2px 6px; font-size: 12px;">X</button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">{{ isset($universite) ? 'Modifier' : 'Enregistrer' }}</button>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        let filiereIndex = {{ count(old('filieres', isset($universite) ? $universite->filieres : [])) }};

        function toggleRemoveButtons() {
            const filieres = $('#filiere-container .filiere-item');
            filieres.find('.remove-filiere').prop('disabled', filieres.length === 1);
        }

        $("#add-filiere").click(function () {
            $("#filiere-container").append(`
            <div class="row filiere-item align-items-center mt-2">
                <div class="col-md-5 mb-3">
                    <input type="text" name="filieres[${filiereIndex}][nom]" class="form-control" placeholder="Nom de la filière" required>
                </div>
                <div class="col-md-5 mb-3">
                    <input type="text" name="filieres[${filiereIndex}][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-2 mb-3">
                    <button type="button" class="btn btn-danger remove-filiere">X</button>
                </div>
            </div>
        `);
            filiereIndex++;
            toggleRemoveButtons();
        });

        $(document).on("click", ".remove-filiere", function () {
            $(this).closest(".filiere-item").remove();
            toggleRemoveButtons();
        });

        let photosToDelete = [];
        $(document).on('click', '.remove-photo-btn', function() {
            const photoId = $(this).data('photo-id');
            if (!photosToDelete.includes(photoId)) {
                photosToDelete.push(photoId);
            }
            $('input[name="photos_to_delete"]').val(photosToDelete.join(','));
            $(this).closest('div.position-relative').hide();
        });

        $(document).ready(function () {
            toggleRemoveButtons();
        });
    </script>
@endsection
