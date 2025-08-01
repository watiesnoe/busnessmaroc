@extends('layouts.app')
@section('titre')
    chambre
@endsection
@section('content')
    <div class="content">
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('offre.index') }}" class="btn btn-primary">Voir la liste</a>
        </div>
        <form id="createform" data-action="{{ route('offre.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-light text-primary fw-semibold  bg-primary">
                    <h5 class="mb-0 text-white">🎯 Publier une offre d'emploi ou de stage</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">

                        <!-- Titre de l'offre -->
                        <div class="col-md-4">
                            <label class="form-label">Titre de l'offre</label>
                            <input type="text" name="titre" class="form-control shadow-sm" placeholder="Ex : Développeur Web" required>
                        </div>

                        <!-- Type d'offre -->
                        <div class="col-md-4">
                            <label class="form-label">Type d'offre</label>
                            <select name="type_offre" id="type_offre" class="form-select shadow-sm" required>
                                <option value="">-- Choisir le type --</option>
                                <option value="emploi">Emploi</option>
                                <option value="stage">Stage</option>
                            </select>
                        </div>

                        <!-- Date de publication -->
                        <div class="col-md-4">
                            <label class="form-label">Date de publication</label>
                            <input type="date" name="date_publication" class="form-control shadow-sm" required>
                        </div>

                        <!-- Nom de l'entreprise -->
                        <div class="col-md-4">
                            <label class="form-label">Entreprise</label>
                            <input type="text" name="entreprise" class="form-control shadow-sm" placeholder="Ex : Orange Mali" required>
                        </div>

                        <!-- Lieu -->
                        <div class="col-md-4">
                            <label class="form-label">Lieu</label>
                            <input type="text" name="lieu" class="form-control shadow-sm" placeholder="Ex : Bamako" required>
                        </div>

                        <!-- Secteur d'activité -->
                        <div class="col-md-4">
                            <label class="form-label">Secteur d'activité</label>
                            <select name="secteur" class="form-select shadow-sm" required>
                                <option value="">-- Sélectionner un secteur --</option>
                                <option value="Informatique">Informatique</option>
                                <option value="Télécommunication">Télécommunication</option>
                                <option value="Finance">Finance</option>
                                <option value="Éducation">Éducation</option>
                                <option value="Santé">Santé</option>
                            </select>
                        </div>

                        <!-- Niveau d'étude -->
                        <div class="col-md-4">
                            <label class="form-label">Niveau d'étude requis</label>
                            <select name="niveau" class="form-select shadow-sm" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="BAC">BAC</option>
                                <option value="BAC+2">BAC+2</option>
                                <option value="BAC+3">BAC+3</option>
                                <option value="BAC+5">BAC+5</option>
                            </select>
                        </div>

                        <!-- Date limite de candidature -->
                        <div class="col-md-4">
                            <label class="form-label">Date limite</label>
                            <input type="date" name="date_limite" class="form-control shadow-sm" required>
                        </div>

                        <!-- Salaire proposé -->
                        <div class="col-md-4" id="salaire_field" style="display: none;">
                            <label class="form-label">Salaire proposé (en FCFA)</label>
                            <input type="number" name="salaire" class="form-control shadow-sm" placeholder="Ex : 150000" min="0">
                        </div>

                        <!-- Profil recherché -->
                        <div class="col-md-12">
                            <label class="form-label">Profil recherché</label>
                            <textarea name="profil_recherche" rows="4" class="form-control shadow-sm" placeholder="Ex : Expérience en développement web, maîtrise de Laravel..." required></textarea>
                        </div>

                        <!-- Description du poste -->
                        <div class="col-md-12">
                            <label class="form-label">Description du poste</label>
                            <textarea name="description" rows="5" class="form-control shadow-sm" placeholder="Décrivez le poste ici..." required></textarea>
                        </div>

                        <!-- Boutons -->
                        <div class="col-md-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow">Publier</button>
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
    document.getElementById('type_offre').addEventListener('change', function () {
        const salaireField = document.getElementById('salaire_field');
        if (this.value === 'emploi') {
            salaireField.style.display = 'block';
        } else {
            salaireField.style.display = 'none';
        }
    });
</script>

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#createform').on('submit', function (e) {--}}
{{--            e.preventDefault();--}}

{{--            let formData = new FormData(this);--}}

{{--            $.ajax({--}}
{{--                url: "{{ route('offre.store') }}",--}}
{{--                type: "POST",--}}
{{--                data: formData,--}}
{{--                processData: false,--}}
{{--                contentType: false,--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('input[name="_token"]').val()--}}
{{--                },--}}
{{--                success: function (response) {--}}
{{--                    Swal.fire({--}}
{{--                        icon: 'success',--}}
{{--                        title: 'Offre publiée !',--}}
{{--                        text: response.message,--}}
{{--                        confirmButtonColor: '#3085d6'--}}
{{--                    });--}}
{{--                    $('#createform')[0].reset();--}}
{{--                },--}}
{{--                error: function (xhr) {--}}
{{--                    if (xhr.status === 422) {--}}
{{--                        let errors = xhr.responseJSON.errors;--}}
{{--                        let message = "";--}}
{{--                        for (let key in errors) {--}}
{{--                            message += `• ${errors[key][0]}\n`;--}}
{{--                        }--}}

{{--                        Swal.fire({--}}
{{--                            icon: 'error',--}}
{{--                            title: 'Erreur de validation',--}}
{{--                            text: message,--}}
{{--                            confirmButtonColor: '#d33'--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        Swal.fire({--}}
{{--                            icon: 'error',--}}
{{--                            title: 'Erreur serveur',--}}
{{--                            text: 'Une erreur s’est produite. Veuillez réessayer.',--}}
{{--                            confirmButtonColor: '#d33'--}}
{{--                        });--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@endsection
