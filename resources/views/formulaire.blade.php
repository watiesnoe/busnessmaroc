@extends('layoutsite.site')

@section('content')
    <section class="position-relative d-flex align-items-center text-white"
             style="min-height:340px; background-image: url('{{ asset('asset/imgs/location.png') }}'); background-size: cover; background-position: center;">
        <div class="hero-overlay position-absolute w-100 h-100" style="top:0;left:0;"></div>
        <div class="container position-relative z-2 py-5 text-center">
            <span class="section-badge bg-white bg-opacity-10 border border-white border-opacity-25 text-white mb-3 d-inline-block" style="letter-spacing:2px;">Réservation</span>
            <h1 class="display-5 fw-bold text-white mb-2" style="text-shadow:0 2px 16px rgba(0,0,0,0.5);">
                Réservation de <span style="color:#f87171;">Chambre</span>
            </h1>
            <p class="lead opacity-90 mb-0">Réservez et payez en toute sécurité votre chambre en ligne.</p>
        </div>
    </section>

    @if (Auth::check() && (Auth::user()->role === 'client' || Auth::user()->role === 'superadmin'))
        <section class="tour-section py-5 bg-light">
            <div class="container">
                <div class="row g-0 shadow rounded-4 overflow-hidden bg-white">
                    <!-- Formulaire -->
                    <div class="col-md-6 p-5">
                        <h3 class="text-navy fw-bold mb-3"><i class="bi bi-calendar-check me-2 text-brand-red"></i>Réservation : {{ $chambre->type }}</h3>

                        <form id="reservationForm" method="POST" action="{{ route('payment.charge') }}">
                            @csrf

                            <!-- Contrat -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Type de contrat</label>
                                <select name="type_contrat" class="form-select form-select-sm" required>
                                    <option value="">-- Sélectionner --</option>
                                    <option value="jour" selected>Par jour</option>
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

                            <!-- Services du propriétaire (Élevage et Livraison de Poulet) -->
                            <div class="card my-4 border-0 shadow-sm rounded-3" style="background: #f8fafc; border-left: 4px solid var(--brand-red);">
                                <div class="card-body p-4">
                                    <h6 class="text-navy fw-bold mb-2 d-flex align-items-center">
                                        <span class="fs-5 me-2">🐔</span> Services & Élevage de Poulets
                                    </h6>
                                    <p class="text-muted small mb-3">
                                        Le propriétaire fait aussi l'élevage de poulets et vous livre des poulets de chair vifs ou leur viande cuite directement à votre logement.
                                    </p>

                                    <!-- Option 1: Poulet de chair vif -->
                                    <div class="form-check mb-3">
                                        <input class="form-check-input chicken-toggle" type="checkbox" id="add_poulet_chair" style="cursor:pointer;">
                                        <label class="form-check-label fw-semibold text-dark" for="add_poulet_chair" style="cursor:pointer;">
                                            Poulet de chair vif (frais) <span class="badge bg-danger-subtle text-danger ms-1">3 000 FCFA / unité</span>
                                        </label>
                                        <div class="mt-2 chicken-qty-wrapper" style="display:none; max-width: 150px;">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text">Quantité</span>
                                                <input type="number" name="poulet_chair_qty" class="form-control chicken-qty-input" value="0" min="0" step="1">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Option 2: Viande cuite de poulet de chair -->
                                    <div class="form-check">
                                        <input class="form-check-input chicken-toggle" type="checkbox" id="add_poulet_cuit" style="cursor:pointer;">
                                        <label class="form-check-label fw-semibold text-dark" for="add_poulet_cuit" style="cursor:pointer;">
                                            Viande cuite de poulet de chair <span class="badge bg-success-subtle text-success ms-1">4 000 FCFA / unité</span>
                                        </label>
                                        <div class="mt-2 chicken-qty-wrapper" style="display:none; max-width: 150px;">
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text">Quantité</span>
                                                <input type="number" name="poulet_cuit_qty" class="form-control chicken-qty-input" value="0" min="0" step="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Prix calculé -->
                            <input type="hidden" name="amount" id="prix_total" readonly required>
                            <small id="prix_calcule" class="text-success fw-bold d-block mt-2 mb-3" style="display:none; font-size: 1rem;"></small>

                            <!-- Paiement -->
                            <hr>
                            <h5 class="text-navy fw-bold mt-4 mb-3"><i class="bi bi-credit-card me-1 text-brand-red"></i> Paiement</h5>
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Numéro de carte</label>
                                <input type="text" name="card_number" class="form-control form-control-sm" placeholder="4111 1111 1111 1111" value="4111111111111111" required>
                            </div>
                            <div class="row g-2">
                                <div class="col-4 mb-3">
                                    <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Mois</label>
                                    <input type="text" name="expiry_month" class="form-control form-control-sm" placeholder="MM" value="08" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">Année</label>
                                    <input type="text" name="expiry_year" class="form-control form-control-sm" placeholder="YYYY" value="2025" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label class="form-label fw-semibold text-muted small text-uppercase" style="letter-spacing:.5px;">CVV</label>
                                    <input type="text" name="cvv" class="form-control form-control-sm" placeholder="123" value="123" required>
                                </div>
                            </div>

                            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">
                            <input type="hidden" name="immobilier_id" value="{{ $chambre->immobilier_id }}">

                            <button type="submit" class="btn btn-brand w-100 mt-3 py-2">
                                <i class="bi bi-lock me-1"></i> Réserver & Payer
                            </button>
                        </form>
                    </div>

                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="{{ asset('asset/imgs/chambres.png') }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            function calculerPrix() {
                let type = $('select[name="type_contrat"]').val();
                let debut = new Date($('input[name="date_debut"]').val());
                let fin = new Date($('input[name="date_fin"]').val());

                if (!type || isNaN(debut) || isNaN(fin) || debut >= fin) {
                    $('#prix_calcule').hide();
                    $('#prix_total').val('');
                    return;
                }

                let jours = (fin - debut) / (1000 * 60 * 60 * 24);
                let prixJour = {{ $chambre->prix_jour }};
                let prixMois = {{ $chambre->prix_mois }};
                let prixAnnee = {{ $chambre->prix_annee }};

                let totalChambre = 0;
                if (type === 'jour') totalChambre = prixJour * jours;
                else if (type === 'mois') totalChambre = prixMois * Math.ceil(jours / 30);
                else if (type === 'annee') totalChambre = prixAnnee * Math.ceil(jours / 365);

                // Options poulets
                let pouletChairQty = $('#add_poulet_chair').is(':checked') ? parseInt($('input[name="poulet_chair_qty"]').val()) || 0 : 0;
                let pouletCuitQty = $('#add_poulet_cuit').is(':checked') ? parseInt($('input[name="poulet_cuit_qty"]').val()) || 0 : 0;

                let totalPoulet = (pouletChairQty * 3000) + (pouletCuitQty * 4000);
                let total = totalChambre + totalPoulet;

                if (total > 0) {
                    $('#prix_total').val(total.toFixed(0));
                    let detailTexte = '💰 Chambre : ' + totalChambre.toLocaleString() + ' FCFA';
                    if (totalPoulet > 0) {
                        detailTexte += ' | 🐔 Suppléments : ' + totalPoulet.toLocaleString() + ' FCFA';
                    }
                    detailTexte += ' | Total Général : ' + total.toLocaleString() + ' FCFA';
                    $('#prix_calcule').show().text(detailTexte);
                } else {
                    $('#prix_calcule').hide();
                    $('#prix_total').val('');
                }
            }

            // Toggles pour afficher les inputs quantité
            $('.chicken-toggle').on('change', function() {
                let wrapper = $(this).siblings('.chicken-qty-wrapper');
                let input = wrapper.find('.chicken-qty-input');
                if ($(this).is(':checked')) {
                    wrapper.slideDown(200);
                    if (parseInt(input.val()) === 0) {
                        input.val(1);
                    }
                } else {
                    wrapper.slideUp(200);
                    input.val(0);
                }
                calculerPrix();
            });

            $('select[name="type_contrat"], input[name="date_debut"], input[name="date_fin"]').on('change', calculerPrix);
            $('input[name="poulet_chair_qty"], input[name="poulet_cuit_qty"]').on('input change', calculerPrix);

            // Soumission AJAX
            $('#reservationForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this);

                $.ajax({
                    url: form.attr('action'),
                    method: "POST",
                    data: form.serialize(),
                    success: function(res){
                        Swal.fire({
                            icon: 'success',
                            title: 'Paiement réussi',
                            text: res.message,
                        }).then(() => location.href = "{{ route('homesite.index') }}");
                    },
                    error: function(xhr){
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: xhr.responseJSON?.message || "Échec du paiement",
                        });
                    }
                });
            });
        });
    </script>
@endsection
{{--@extends('layoutsite.site')--}}

{{--@section('content')--}}
{{--    <div class="container mt-5">--}}
{{--        <h3>Paiement Test Authorize.Net Sandbox</h3>--}}
{{--        <form id="paymentForm">--}}
{{--            @csrf--}}
{{--            <div class="mb-3">--}}
{{--                <label>Montant</label>--}}
{{--                <input type="number" name="amount" class="form-control" value="1" required>--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label>Numéro de carte</label>--}}
{{--                <input type="text" name="card_number" class="form-control" value="4111111111111111" required>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-4 mb-3">--}}
{{--                    <label>Mois</label>--}}
{{--                    <input type="text" name="expiry_month" class="form-control" value="12" required>--}}
{{--                </div>--}}
{{--                <div class="col-4 mb-3">--}}
{{--                    <label>Année</label>--}}
{{--                    <input type="text" name="expiry_year" class="form-control" value="2026" required>--}}
{{--                </div>--}}
{{--                <div class="col-4 mb-3">--}}
{{--                    <label>CVV</label>--}}
{{--                    <input type="text" name="cvv" class="form-control" value="123" required>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">Payer</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $('#paymentForm').submit(function(e){--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('payment.charge') }}",--}}
{{--                type: "POST",--}}
{{--                data: $(this).serialize(),--}}
{{--                success: function(res){--}}
{{--                    alert(res.message);--}}
{{--                },--}}
{{--                error: function(xhr){--}}
{{--                    alert(xhr.responseJSON?.message || 'Échec du paiement');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
