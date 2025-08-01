<section class="pt-5 pb-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-primary">Réservation de la chambre : {{ $chambre->type }}</h3>
            <p class="text-muted">Remplissez les informations pour effectuer la réservation</p>
        </div>

        <div class="row justify-content-center align-items-center">
            <!-- Image gauche -->
           

            <!-- Formulaire de réservation -->
            <div class="col-lg-6 col-md-10">
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-primary text-white rounded-top-4">
                        <h5 class="mb-0">Détails de la réservation</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('reservation.paiement') }}" method="POST" id="reservationForm">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Type de contrat</label>
                                <select name="type_contrat" class="form-select" required>
                                    <option value="">-- Sélectionner --</option>
                                    <option value="jour">Par jour</option>
                                    <option value="mois">Par mois</option>
                                    <option value="annee">Par année</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date de début</label>
                                <input type="date" name="date_debut" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date de fin</label>
                                <input type="date" name="date_fin" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tarifs de la chambre</label>
                                <ul class="mb-0">
                                    <li><strong>Par jour :</strong> {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA</li>
                                    <li><strong>Par mois :</strong> {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA</li>
                                    <li><strong>Par an :</strong> {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA</li>
                                </ul>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Conditions particulières (facultatif)</label>
                                <textarea name="conditions_particulieres" class="form-control" rows="3"></textarea>
                            </div>

                            <input type="hidden" name="immobilier_id" value="{{ $chambre->immobilier_id }}">
                            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">
                            <input type="hidden" name="prix_total" id="prix_total" readonly required>
                            <small id="prix_calcule" class="text-success mt-2 d-block" style="display:none;"></small>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 mt-3">Réserver maintenant</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Image droite -->
           
        </div>
    </div>
</section>


