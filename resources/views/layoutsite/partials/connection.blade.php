{{-- <section class="tour-section py-5 bg-light">
  <div class="text-center mb-4">
    <h2 class="section-title wow animate__animated animate__fadeInUp text-primary">
      Remplissez ce formulaire pour réserver votre chambre
    </h2>
  </div>

  <div class="container">
    <div class="row g-0 shadow rounded-4 overflow-hidden bg-white min-vh-50">
      <!-- Image -->
      <div class="col-md-6 order-2 order-md-1">
        <img src="{{ asset('asset/imgs/chambres.png') }}" alt="Chambre" class="img-fluid w-100 h-100" style="object-fit: cover;">
      </div>

      <!-- Formulaire -->
      <div class="col-md-6 p-5 d-flex flex-column justify-content-center order-1 order-md-2">
        <h3 class="text-primary fw-bold mb-3">Réservation : {{ $chambre->type }}</h3>
        <p class="text-muted mb-4">Remplissez les informations pour effectuer la réservation</p>

        <form action="{{ route('paypal.createOrder') }}" method="POST" id="reservationForm" class="needs-validation" novalidate>
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold text-dark">Type de contrat</label>
            <select name="type_contrat" class="form-select rounded shadow-sm" required>
              <option value="">-- Sélectionner --</option>
              <option value="jour">Par jour</option>
              <option value="mois">Par mois</option>
              <option value="annee">Par année</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold text-dark">Date de début</label>
              <input type="date" name="date_debut" class="form-control rounded shadow-sm" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold text-dark">Date de fin</label>
              <input type="date" name="date_fin" class="form-control rounded shadow-sm" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold text-dark">Tarifs de la chambre</label>
            <div class="p-3 border rounded bg-light">
              <ul class="mb-0 list-unstyled text-primary fw-semibold">
                <li><i class="bi bi-check-circle-fill me-1 text-primary"></i> Par jour : {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA</li>
                <li><i class="bi bi-check-circle-fill me-1 text-primary"></i> Par mois : {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA</li>
                <li><i class="bi bi-check-circle-fill me-1 text-primary"></i> Par an : {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA</li>
              </ul>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold text-dark">Conditions particulières (facultatif)</label>
            <textarea name="conditions_particulieres" class="form-control rounded shadow-sm" rows="3"></textarea>
          </div>

          <input type="hidden" name="immobilier_id" value="{{ $chambre->immobilier_id }}">
          <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">
          <input type="hidden" name="prix_total" id="prix_total" readonly required>
          <small id="prix_calcule" class="text-success d-block mt-2 fst-italic" style="display:none;"></small>

          <button type="submit" class="btn btn-primary w-100 py-3 mt-3 d-flex justify-content-center align-items-center fw-bold fs-5 shadow-sm">
            Réserver maintenant
          </button>
        </form>
      </div>
    </div>
  </div>
</section> --}}

<section class="tour-section py-5 bg-light">
  <div class="text-center mb-4">
    <h2 class="section-title wow animate__animated animate__fadeInUp text-primary">
      Remplissez ce formulaire pour réserver votre chambre
    </h2>
  </div>

  <div class="container">
    <div class="row g-0 shadow rounded-4 overflow-hidden bg-white min-vh-50">
      <!-- Formulaire à droite sur desktop, en haut sur mobile -->
      <div class="col-md-6 p-5 d-flex flex-column justify-content-center order-1 order-md-2">
        <h3 class="text-primary fw-bold mb-3">Réservation : {{ $chambre->type }}</h3>
        <p class="text-muted mb-4">Remplissez les informations pour effectuer la réservation</p>

        <form action="{{ route('paypal.createOrder') }}" method="POST" id="reservationForm" class="needs-validation" novalidate>
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold text-dark">Type de contrat</label>
            <select name="type_contrat" class="form-select rounded shadow-sm" required>
              <option value="">-- Sélectionner --</option>
              <option value="jour">Par jour</option>
              <option value="mois">Par mois</option>
              <option value="annee">Par année</option>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold text-dark">Date de début</label>
              <input type="date" name="date_debut" class="form-control rounded shadow-sm" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-semibold text-dark">Date de fin</label>
              <input type="date" name="date_fin" class="form-control rounded shadow-sm" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold text-dark">Tarifs de la chambre</label>
            <div class="p-3 border rounded bg-light">
              <ul class="mb-0 list-unstyled text-primary fw-semibold">
                <li><i class="bi bi-check-circle-fill me-1 text-primary"></i> Par jour : {{ number_format($chambre->prix_jour, 0, ',', ' ') }} FCFA</li>
                <li><i class="bi bi-check-circle-fill me-1 text-primary"></i> Par mois : {{ number_format($chambre->prix_mois, 0, ',', ' ') }} FCFA</li>
                <li><i class="bi bi-check-circle-fill me-1 text-primary"></i> Par an : {{ number_format($chambre->prix_annee, 0, ',', ' ') }} FCFA</li>
              </ul>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold text-dark">Conditions particulières (facultatif)</label>
            <textarea name="conditions_particulieres" class="form-control rounded shadow-sm" rows="3"></textarea>
          </div>

          <input type="hidden" name="immobilier_id" value="{{ $chambre->immobilier_id }}">
          <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">
          <input type="hidden" name="prix_total" id="prix_total" readonly required>
          <small id="prix_calcule" class="text-success d-block mt-2 fst-italic" style="display:none;"></small>

          <button type="submit" class="btn btn-primary w-100 py-3 mt-3 d-flex justify-content-center align-items-center fw-bold fs-5 shadow-sm">
            Réserver maintenant
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

