<div class="container mt-5">
    <h2>Réservation de la chambre : {{ $chambre->type }}</h2>

    <form action="{{ url('/reservation/' . $chambre->immobilier_id . '/' . $chambre->id) }}" method="POST" id="reservationForm">
        @csrf
        <h4>Détails de la réservation</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Date de début</label>
                <input type="date" name="date_debut" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Date de fin</label>
                <input type="date" name="date_fin" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Type de contrat</label>
                <select name="type_contrat" class="form-control" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="jour">Par jour</option>
                    <option value="mois">Par mois</option>
                    <option value="annee">Par année</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label>Tarifs de la chambre</label>
                <ul>
                    <li><strong>Par jour :</strong> {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA</li>
                    <li><strong>Par mois :</strong> {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA</li>
                    <li><strong>Par an :</strong> {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA</li>
                </ul>
            </div>

            <div class="col-md-12 mb-3">
                <label>Conditions particulières (facultatif)</label>
                <textarea name="conditions_particulieres" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Prix total (calculé automatiquement)</label>
                <input type="text" id="prix_total" name="prix_total" class="form-control" readonly required>
                <small id="prix_calcule" class="text-success mt-2 d-block" style="display:none;"></small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>
