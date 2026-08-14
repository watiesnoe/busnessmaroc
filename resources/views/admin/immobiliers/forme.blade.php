<div class="block block-rounded ">
    <div class="block-header block-header-default">
        <h3 class="block-title">Espace d'enregistrement</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row items-push">
            <div class="row">

                {{-- TYPE DE BIEN --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Type de bien <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Choisir --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $immobilier->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- ENTREPRISE / PROPRIETAIRE --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Entreprise / Propriétaire</label>
                    <select id="entreprise_select" name="entreprise_id" class="form-select">
                        <option value="">-- Sélectionner une entreprise --</option>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" {{ old('entreprise_id', $immobilier->entreprise_id ?? '') == $entreprise->id ? 'selected' : '' }}>
                                {{ $entreprise->nom }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="btnNewEntreprise">+ Ajouter une nouvelle entreprise</button>
                </div>

                {{-- FORMULAIRE NOUVELLE ENTREPRISE --}}
                <div id="newEntrepriseForm" class="col-12 mb-4 p-3 border rounded" style="display: none; background:#f9f9f9;">
                    <h6>Nouvelle entreprise</h6>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Nom</label>
                            <input type="text" name="new_entreprise[nom]" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Email</label>
                            <input type="email" name="new_entreprise[email]" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Téléphone</label>
                            <input type="text" name="new_entreprise[telephone]" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Adresse</label>
                            <input type="text" name="new_entreprise[adresse]" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Site web</label>
                            <input type="text" name="new_entreprise[site_web]" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Secteur</label>
                            <input type="text" name="new_entreprise[secteur]" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Description</label>
                            <textarea name="new_entreprise[description]" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                {{-- TITRE DE L'ANNONCE --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Titre de l'annonce <span class="text-danger">*</span></label>
                    <input type="text" name="titre" class="form-control"
                           value="{{ old('titre', $immobilier->titre ?? '') }}" required>
                </div>

                {{-- VILLE --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Ville <span class="text-danger">*</span></label>
                    <input type="text" name="ville" class="form-control"
                           value="{{ old('ville', $immobilier->ville ?? '') }}" required>
                </div>

                {{-- QUARTIER --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Quartier</label>
                    <input type="text" name="quartier" class="form-control"
                           value="{{ old('quartier', $immobilier->quartier ?? '') }}">
                </div>

                {{-- SURFACE --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Surface (m²) <span class="text-danger">*</span></label>
                    <input type="number" step="0.1" name="surface" class="form-control"
                           value="{{ old('surface', $immobilier->surface ?? '') }}" required>
                </div>

                {{-- PRIX --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Prix <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="prix" class="form-control"
                           value="{{ old('prix', $immobilier->prix ?? '') }}" required>
                </div>

                {{-- ETAGE --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Étage</label>
                    <input type="number" name="etage" class="form-control"
                           value="{{ old('etage', $immobilier->etage ?? '') }}">
                </div>

                {{-- STATUT --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Statut</label>
                    <select name="statut" class="form-select">
                        <option value="disponible" {{ old('statut', $immobilier->statut ?? '') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="reserve" {{ old('statut', $immobilier->statut ?? '') == 'reserve' ? 'selected' : '' }}>Réservé</option>
                        <option value="loue" {{ old('statut', $immobilier->statut ?? '') == 'loue' ? 'selected' : '' }}>Loué</option>
                    </select>
                </div>

                {{-- PHOTOS --}}
                <div class="col-md-4 mb-4">
                    <label class="form-label">Ajouter des photos</label>
                    <input type="file" name="photos[]" multiple class="form-control">
                </div>

                {{-- EN VEDETTE --}}
                <div class="col-md-4 d-flex align-items-end mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="en_vedette" id="en_vedette" value="1"
                            {{ old('en_vedette', $immobilier->en_vedette ?? '') ? 'checked' : '' }}>
                        <label class="form-check-label" for="en_vedette">
                            Mettre cette annonce à la une
                        </label>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $immobilier->description ?? '') }}</textarea>
                </div>

                {{-- PHOTOS EXISTANTES --}}
                @if (isset($immobilier) && $immobilier->photos->isNotEmpty())
                    <div class="col-md-12 mb-4">
                        <label class="form-label">Photos existantes</label>
                        <div class="row">
                            @foreach ($immobilier->photos as $photo)
                                <div class="col-md-3 text-center mb-3">
                                    <img src="{{ get_image_url($photo->url) }}" alt="photo"
                                         class="img-fluid rounded mb-2" style="height: 100px; object-fit: cover;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="photo_principale"
                                               value="{{ $photo->id }}" {{ $photo->principale ? 'checked' : '' }}>
                                        <label class="form-check-label">Photo principale</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
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
                    @if (isset($immobilier))
                        @foreach ($immobilier->chambres as $index => $chambre)
                            <tr>
                                <td>
                                    <select name="chambres[{{ $index }}][type]" class="form-control" required>
                                        <option value="chambre_simple" {{ $chambre->type == 'chambre_simple' ? 'selected' : '' }}>Chambre simple</option>
                                        <option value="chambre_double" {{ $chambre->type == 'chambre_double' ? 'selected' : '' }}>Chambre double</option>
                                        <option value="studio" {{ $chambre->type == 'studio' ? 'selected' : '' }}>Studio</option>
                                        <option value="suite" {{ $chambre->type == 'suite' ? 'selected' : '' }}>Suite</option>
                                        <option value="chambre_partagee" {{ $chambre->type == 'chambre_partagee' ? 'selected' : '' }}>Partagée</option>
                                        <option value="dortoir" {{ $chambre->type == 'dortoir' ? 'selected' : '' }}>Dortoir</option>
                                        <option value="chambre_deluxe" {{ $chambre->type == 'chambre_deluxe' ? 'selected' : '' }}>Deluxe</option>
                                        <option value="chambre_familiale" {{ $chambre->type == 'chambre_familiale' ? 'selected' : '' }}>Familiale</option>
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