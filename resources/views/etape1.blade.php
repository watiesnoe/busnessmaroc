@extends('layoutsite.site')

@section('titre', 'Étape 1 : Choix du contrat — Business Maroc')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden bg-white">
                <div class="card-header text-white border-0 py-3" style="background: var(--brand-navy); border-bottom: 4px solid var(--brand-red) !important;">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-calendar-range me-2 text-brand-red"></i>Étape 1 : Choix du contrat</h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('reservation.step2') }}">
                        @csrf
                        <input type="hidden" name="immobilier_id" value="{{ $immobilierId }}">
                        <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">

                        <div class="mb-3">
                            <label for="type_contrat" class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Type de contrat</label>
                            <select name="type_contrat" class="form-select form-select-sm" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="jour">Par jour ({{ number_format($chambre->prix_jour, 0, ',', ' ') }} F CFA)</option>
                                <option value="mois">Par mois ({{ number_format($chambre->prix_mois, 0, ',', ' ') }} F CFA)</option>
                                <option value="annee">Par an ({{ number_format($chambre->prix_annee, 0, ',', ' ') }} F CFA)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_debut" class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Date de début</label>
                            <input type="date" name="date_debut" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_fin" class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Date de fin</label>
                            <input type="date" name="date_fin" class="form-control form-control-sm" required>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-brand py-2">
                                Suivant <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
