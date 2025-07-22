<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Validation Form</h3>

    </div>
    <div class="block-content block-content-full">
        <!-- Regular -->

        <div class="row items-push">
            <!-- Catégorie -->
            <div class="col-md-6 mb-3">
                <label>Type de bien <span class="text-danger">*</span></label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Choisir --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{(old('category_id',$immobilier->category_id ?? '')==$cat->id ? 'selected' : '' )}}>
                            {{ $cat->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Titre -->
            <div class="col-md-6 mb-3">
                <label>Titre de l'annonce <span class="text-danger">*</span></label>
                <input type="text" name="titre" class="form-control" value="{{ old('titre', $immobilier->titre ?? '') }}" required>
            </div>

            <!-- Description -->
            <div class="col-md-12 mb-3">
                <label>Description <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $immobilier->description ?? '') }}</textarea>
            </div>

            <!-- Ville -->
            <div class="col-md-6 mb-3">
                <label>Ville <span class="text-danger">*</span></label>
                <input type="text" name="ville" class="form-control" value="{{ old('ville', $immobilier->ville ?? '') }}" required>
            </div>

            <!-- Quartier -->
            <div class="col-md-6 mb-3">
                <label>Quartier</label>
                <input type="text" name="quartier" class="form-control" value="{{ old('quartier', $immobilier->quartier ?? '') }}">
            </div>

            <!-- Surface -->
            <div class="col-md-4 mb-3">
                <label>Surface (m²) <span class="text-danger">*</span></label>
                <input type="number" step="0.1" name="surface" class="form-control" value="{{ old('surface', $immobilier->surface ?? '') }}" required>
            </div>

            <!-- Prix -->
            <div class="col-md-4 mb-3">
                <label>Prix <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix', $immobilier->prix ?? '') }}" required>
            </div>

            <!-- Etage -->
            <div class="col-md-4 mb-3">
                <label>Étage</label>
                <input type="number" name="etage" class="form-control" value="{{ old('etage', $immobilier->etage ?? '') }}">
            </div>

            <!-- Statut -->
            <div class="col-md-4 mb-3">
                <label>Statut</label>
                <select name="statut" class="form-control">
                    <option value="disponible"  {{(old('statut',$immobilier->statut  ?? '')=='disponible' ? 'selected' : ''  )}} >Disponible</option>
                    <option value="reserve"  {{(old('statut',$immobilier->statut  ?? '')=='reserve' ? 'selected' : ''  )}} >Réservé</option>
                    <option value="loue"  {{(old('statut',$immobilier->statut  ?? '')=='loue' ? 'selected' : ''  )}} >Loué</option>
                </select>
            </div>

            <!-- Photos -->
            <div class="col-md-4 mb-3">
                <label>Photos</label>
                <input type="file" name="photos[]" multiple class="form-control">
            </div>

            <!-- En vedette -->
            <div class="col-md-4 mb-3 mt-4">
                <input class="form-check-input" type="checkbox" name="en_vedette" id="en_vedette" value="1"
                    {{ old('en_vedette', $immobilier->en_vedette?? '') ? 'checked' : '' }}>
                <label class="form-check-label" for="en_vedette">
                    Mettre cette annonce à la une
                </label>
            </div>

            <!-- Chambres dynamiques -->
            <div class="col-12">
                <h5>Chambres</h5>
                <table class="table table-bordered" id="chambres-table">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Capacité</th>
                        <th>Prix (jour / mois / année)</th>
                        <th>Statut</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="chambres-body">
                    @if(isset($immobilier))
                        @foreach($immobilier->chambres as $index => $chambre)
                            <tr>
                                <td>
                                    <select name="chambres[{{ $index }}][type]" class="form-control" required>
                                        <option value="chambre_simple" {{ $chambre->type == 'chambre_simple' ? 'selected' : '' }}>Chambre simple</option>
                                        <option value="chambre_double" {{ $chambre->type == 'chambre_double' ? 'selected' : '' }}>Chambre double</option>
                                        <option value="studio" {{ $chambre->type == 'studio' ? 'selected' : '' }}>Studio</option>
                                        <option value="suite" {{ $chambre->type == 'suite' ? 'selected' : '' }}>Suite</option>
                                        <option value="chambre_partagee" {{ $chambre->type == 'chambre_partagee' ? 'selected' : '' }}>Chambre partagée</option>
                                        <option value="dortoir" {{ $chambre->type == 'dortoir' ? 'selected' : '' }}>Dortoir</option>
                                        <option value="chambre_deluxe" {{ $chambre->type == 'chambre_deluxe' ? 'selected' : '' }}>Chambre deluxe</option>
                                        <option value="chambre_familiale" {{ $chambre->type == 'chambre_familiale' ? 'selected' : '' }}>Chambre familiale</option>
                                        <option value="appartement" {{ $chambre->type == 'appartement' ? 'selected' : '' }}>Appartement</option>
                                        <option value="bungalow" {{ $chambre->type == 'bungalow' ? 'selected' : '' }}>Bungalow</option>
                                        <option value="villa" {{ $chambre->type == 'villa' ? 'selected' : '' }}>Villa</option>
                                        <option value="mezzanine" {{ $chambre->type == 'mezzanine' ? 'selected' : '' }}>Mezzanine</option>
                                    </select>
                                </td>
                                <td><input type="number" name="chambres[{{ $index }}][capacite]" class="form-control" value="{{ $chambre->capacite }}" required></td>
                                <td>
                                    <input type="number" name="chambres[{{ $index }}][prix_jour]" class="form-control mb-1" placeholder="Jour" value="{{ $chambre->prix_jour }}">
                                    <input type="number" name="chambres[{{ $index }}][prix_mois]" class="form-control mb-1" placeholder="Mois" value="{{ $chambre->prix_mois }}">
                                    <input type="number" name="chambres[{{ $index }}][prix_annee]" class="form-control" placeholder="Année" value="{{ $chambre->prix_annee }}">
                                </td>
                                <td>
                                    <select name="chambres[{{ $index }}][statut]" class="form-control">
                                        <option value="disponible" {{ $chambre->statut == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                        <option value="reservee" {{ $chambre->statut == 'reservee' ? 'selected' : '' }}>Réservée</option>
                                        <option value="occupee" {{ $chambre->statut == 'occupee' ? 'selected' : '' }}>Occupée</option>
                                    </select>
                                </td>
                                <td><textarea name="chambres[{{ $index }}][description]" class="form-control">{{ $chambre->description }}</textarea></td>
                                <td><button type="button" class="btn btn-danger btn-sm remove-chambre">X</button></td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
                <button type="button" id="addChambre" class="btn btn-secondary mb-3">+ Ajouter une chambre</button>
            </div>

            <!-- Submit -->
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </div>
    </div>
</div>
