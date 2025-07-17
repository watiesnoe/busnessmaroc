@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <!-- Navigation -->
        <div class="row">
            <div class="card mt-2">
                <div class="card-body  ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">👥 Espace d'ajout des entreprises</h5>
                    </div>
                    <div class="card-body bg-white">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Nom de l'entreprise</label>
                                <input type="text" name="nom" class="form-control shadow-sm"
                                    placeholder="Ex : Orange Mali" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control shadow-sm"
                                    placeholder="Ex : contact@entreprise.com" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" name="telephone" class="form-control shadow-sm"
                                    placeholder="Ex : +223 76 00 00 00" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Adresse</label>
                                <input type="text" name="adresse" class="form-control shadow-sm"
                                    placeholder="Ex : Hamdallaye ACI 2000, Bamako" required>
                            </div>

                            <div class="col-md-4">
                              
                                    <label class="form-label">Secteur d'activité</label>
                                    <select name="secteur" class="form-select shadow-sm" required>
                                        <option value="">-- Choisir un secteur --</option>
                                        <option value="agriculture">Agriculture</option>
                                        <option value="banque">Banque / Finance</option>

                                        <option value="informatique">Informatique / Télécoms</option>

                                    </select>
                                </div>


                            <div class="col-md-4">
                                <label class="form-label">Site web (optionnel)</label>
                                <input type="url" name="site_web" class="form-control shadow-sm"
                                    placeholder="https://www.exemple.com">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Description de l'entreprise</label>
                                <textarea name="description" class="form-control shadow-sm" rows="4"
                                    placeholder="Décrivez brièvement l'entreprise" required></textarea>
                            </div>

                            <div class="col-md-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2 shadow">Soumettre</button>
                                <a href="{{ route('entreprises.index') }}" class="btn btn-info px-4 py-2 shadow">Voir la
                                    liste</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END Navigation -->
    </div>
@endsection
