
@extends('layoutsite.site')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Étape 1 : Choix du contrat</h2>

        <form method="POST" action="{{ route('reservation.step2') }}">
            @csrf

            <input type="hidden" name="immobilier_id" value="{{ $immobilierId }}">
            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

            <div class="mb-3">
                <label for="type_contrat" class="form-label">Type de contrat</label>
                <select name="type_contrat" class="form-select" required>
                    <option value="">-- Sélectionnez --</option>
                    <option value="jour">Par jour ({{ number_format($chambre->prix_jour, 0, ',', ' ') }} F CFA)</option>
                    <option value="mois">Par mois ({{ number_format($chambre->prix_mois, 0, ',', ' ') }} F CFA)</option>
                    <option value="annee">Par an ({{ number_format($chambre->prix_annee, 0, ',', ' ') }} F CFA)</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de début</label>
                <input type="date" name="date_debut" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_fin" class="form-label">Date de fin</label>
                <input type="date" name="date_fin" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Suivant</button>
        </form>
    </div>
@endsection
