@extends('layouts.app')
@section('titre')
    Modifier la Chambre
@endsection
@section('content')
  <div class="content">
        <div class="mb-3 text-end" >
            <a href="{{route('chambres.index')}}" class="btn btn-primary">Voir la liste</a>
        </div>
        <form id="createform" data-action="{{ route('chambres.update', $chambre->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Modifier les informations de la chambre</h3>
              </div>
              <div class="block-content block-content-full">
                <!-- Regular -->
                <div class="mb-4">
                    <label class="form-label" for="immobilier_id">Veuillez sélectionner un immobilier <span class="text-danger">*</span></label>
                    <select class="js-select2 form-select mb-5" id="immobilier_id" name="immobilier_id" style="width: 100%;" data-placeholder="Choose one.." required>
                        @foreach($immobiliers as $immo)
                            <option value="{{ $immo->id }}" {{ $immo->id == $chambre->immobilier_id ? 'selected' : '' }}>{{ $immo->titre }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="type">Catégorie (Type)</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">-- Choisir catégorie --</option>
                                <option value="Standard" {{ $chambre->type == 'Standard' ? 'selected' : '' }}>Standard</option>
                                <option value="Confort" {{ $chambre->type == 'Confort' ? 'selected' : '' }}>Confort</option>
                                <option value="VIP" {{ $chambre->type == 'VIP' ? 'selected' : '' }}>VIP</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="capacite">Capacité</label>
                            <input type="number" name="capacite" id="capacite" class="form-control" value="{{ $chambre->capacite }}" placeholder="Capacité" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="statut">Statut</label>
                            <select name="statut" id="statut" required class="form-control">
                                <option value="disponible" {{ $chambre->statut == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="reservee" {{ $chambre->statut == 'reservee' ? 'selected' : '' }}>Réservée</option>
                                <option value="occupee" {{ $chambre->statut == 'occupee' ? 'selected' : '' }}>Occupée</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="prix_jour">Prix/Jour</label>
                            <input type="number" name="prix_jour" id="prix_jour" class="form-control" value="{{ $chambre->prix_jour }}" placeholder="Prix journalier" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="prix_mois">Prix/Mois</label>
                            <input type="number" name="prix_mois" id="prix_mois" class="form-control" value="{{ $chambre->prix_mois }}" placeholder="Prix mensuel" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="prix_annee">Prix/Année</label>
                            <input type="number" name="prix_annee" id="prix_annee" class="form-control" value="{{ $chambre->prix_annee }}" placeholder="Prix annuel" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="" rows="5">{{ $chambre->description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col mb-2 text-end">
                    <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Enregistrer les modifications</button>
                </div>
              </div>
            </div>
        </form>
 </div>
@endsection