{{-- resources/views/admin/entreprises/form.blade.php --}}
@extends('layouts.app')

@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">
                            👥 {{ isset($entreprise) ? 'Édition de l’entreprise' : "Espace d'ajout des entreprises" }}
                        </h5>
                    </div>

                    <div class="card-body bg-white">
                        <form id="entrepriseForm">
                            @csrf
                            @if(isset($entreprise))
                                @method('PUT')
                            @endif

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Nom de l'entreprise</label>
                                    <input type="text" name="nom" class="form-control shadow-sm"
                                           placeholder="Ex : Orange Mali" required
                                           value="{{ $entreprise->nom ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control shadow-sm"
                                           placeholder="Ex : contact@entreprise.com" required
                                           value="{{ $entreprise->email ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Téléphone</label>
                                    <input type="tel" name="telephone" class="form-control shadow-sm"
                                           placeholder="Ex : +223 76 00 00 00" required
                                           value="{{ $entreprise->telephone ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" name="adresse" class="form-control shadow-sm"
                                           placeholder="Ex : Hamdallaye ACI 2000, Bamako" required
                                           value="{{ $entreprise->adresse ?? '' }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Secteur d'activité</label>
                                    <select name="secteur" class="form-select shadow-sm" required>
                                        <option value="">-- Choisir un secteur --</option>
                                        <option value="agriculture" {{ (isset($entreprise) && $entreprise->secteur=='agriculture') ? 'selected':'' }}>Agriculture</option>
                                        <option value="banque" {{ (isset($entreprise) && $entreprise->secteur=='banque') ? 'selected':'' }}>Banque / Finance</option>
                                        <option value="informatique" {{ (isset($entreprise) && $entreprise->secteur=='informatique') ? 'selected':'' }}>Informatique / Télécoms</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Site web (optionnel)</label>
                                    <input type="url" name="site_web" class="form-control shadow-sm"
                                           placeholder="https://www.exemple.com"
                                           value="{{ $entreprise->site_web ?? '' }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Description de l'entreprise</label>
                                    <textarea name="description" class="form-control shadow-sm" rows="4"
                                              placeholder="Décrivez brièvement l'entreprise" required>{{ $entreprise->description ?? '' }}</textarea>
                                </div>

                                <div class="col-md-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4 py-2 shadow">
                                        {{ isset($entreprise) ? 'Mettre à jour' : 'Soumettre' }}
                                    </button>
                                    <a href="{{ route('entreprises.index') }}" class="btn btn-info px-4 py-2 shadow">Voir la liste</a>
                                </div>
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
            $('#entrepriseForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var url = '{{ isset($entreprise) ? route("entreprises.update", $entreprise->id) : route("entreprises.store") }}';
                var type = '{{ isset($entreprise) ? "PUT" : "POST" }}';

                $.ajax({
                    url: url,
                    type: type,
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: '{{ isset($entreprise) ? "Entreprise mise à jour avec succès !" : "Entreprise ajoutée avec succès !" }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        if(!{{ isset($entreprise) ? 'true' : 'false' }}) {
                            $('#entrepriseForm')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let messages = '';
                        for (let field in errors) {
                            messages += errors[field].join(', ') + '\n';
                        }
                        alert('Erreur:\n' + messages);
                    }
                });
            });
        });
    </script>
@endsection
