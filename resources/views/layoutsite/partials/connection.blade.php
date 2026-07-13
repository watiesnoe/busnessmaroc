<section class="tour-section py-5 bg-light">
  <div class="text-center mb-4">
    <h2 class="section-title wow animate__animated animate__fadeInUp text-navy" style="font-weight: 800;">
      Remplissez ce formulaire pour réserver votre chambre
    </h2>
  </div>

  <div class="container">
    <div class="row g-0 shadow rounded-4 overflow-hidden bg-white min-vh-50">
      <!-- Formulaire à droite sur desktop, en haut sur mobile -->
      <div class="col-md-6 p-5 d-flex flex-column justify-content-center order-1 order-md-2">
        <h3 class="text-navy fw-bold mb-3"><i class="bi bi-bookmark-plus text-brand-red me-2"></i>Réservation : {{ $chambre->type }}</h3>
        <p class="text-muted mb-4">Remplissez les informations pour effectuer la réservation</p>

{{--        <form action="{{ route('paypal.createOrder') }}" method="POST" id="reservationForm" class="needs-validation" novalidate>--}}
        <form action="{{ route('payment.form') }}" method="POST" id="reservationForm" class="needs-validation" novalidate>
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Type de contrat</label>
            <select name="type_contrat" class="form-select form-select-sm" required>
              <option value="">-- Sélectionner --</option>
              <option value="jour">Par jour</option>
              <option value="mois">Par mois</option>
              <option value="annee">Par année</option>
            </select>
          </div>

          <div class="row g-3">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Date de début</label>
              <input type="date" name="date_debut" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Date de fin</label>
              <input type="date" name="date_fin" class="form-control form-control-sm" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Tarifs de la chambre</label>
            <div class="p-3 border rounded bg-light">
              <ul class="mb-0 list-unstyled fw-semibold text-navy">
                <li class="mb-1"><i class="bi bi-check-circle-fill me-1 text-brand-red"></i> Par jour : <span class="text-brand-red">{{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA</span></li>
                <li class="mb-1"><i class="bi bi-check-circle-fill me-1 text-brand-red"></i> Par mois : <span class="text-brand-red">{{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA</span></li>
                <li><i class="bi bi-check-circle-fill me-1 text-brand-red"></i> Par an : <span class="text-brand-red">{{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA</span></li>
              </ul>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Conditions particulières (facultatif)</label>
            <textarea name="conditions_particulieres" class="form-control form-control-sm" rows="3" placeholder="Spécifiez vos demandes ici..."></textarea>
          </div>

          <input type="hidden" name="immobilier_id" value="{{ $chambre->immobilier_id }}">
          <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">
          <input type="hidden" name="prix_total" id="prix_total" readonly required>
          <small id="prix_calcule" class="text-success d-block mt-2 fst-italic" style="display:none;"></small>

          <button type="submit" class="btn btn-brand w-100 py-2.5 mt-3 d-flex justify-content-center align-items-center fw-bold shadow-sm">
            <i class="bi bi-check2-circle me-1"></i> Réserver maintenant
          </button>
        </form>
      </div>

      <!-- Image à gauche sur desktop, en bas sur mobile -->
      <div class="col-md-6 order-2 order-md-1">
        <img src="{{ asset('asset/imgs/chambres.png') }}" alt="Chambre" class="img-fluid w-100 h-100" style="object-fit: cover;">
      </div>
    </div>
  </div>
</section>

