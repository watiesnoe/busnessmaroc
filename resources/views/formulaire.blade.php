@extends('layoutsite.site')

@section('content')
    <section class="text-white d-flex align-items-center"
             style="background-image: url('{{ asset('asset/imgs/location.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container text-center">
            <h3 class="fw-bold mb-3" style="font-size: 2.8rem; color: #f5f5f5;">
                <span class="text-primary">Trouvez</span> le logement idéal
            </h3>
            <p class="lead mx-auto" style="max-width: 750px; color: #f0f0f0; text-shadow: 1px 1px 4px rgba(0,0,0,0.8);">
                Réservez et payez en toute sécurité votre chambre en ligne.
            </p>
        </div>
    </section>

    @if (Auth::check() && (Auth::user()->role === 'client' || Auth::user()->role === 'superadmin'))
        <section class="tour-section py-5 bg-light">
            <div class="container">
                <div class="row g-0 shadow rounded-4 overflow-hidden bg-white">
                    <!-- Formulaire -->
                    <div class="col-md-6 p-5">
                        <h3 class="text-primary fw-bold mb-3">Réservation : {{ $chambre->type }}</h3>

                        <form id="reservationForm" method="POST" action="{{ route('payment.charge') }}">
                            @csrf

                            <!-- Contrat -->
                            <div class="mb-3">
                                <label class="form-label">Type de contrat</label>
                                <select name="type_contrat" class="form-select" required>
                                    <option value="">-- Sélectionner --</option>
                                    <option value="jour" selected>Par jour</option>
                                    <option value="mois">Par mois</option>
                                    <option value="annee">Par année</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Date de début</label>
                                    <input type="date" name="date_debut" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Date de fin</label>
                                    <input type="date" name="date_fin" class="form-control" required>
                                </div>
                            </div>

                            <!-- Prix calculé -->
                            <input type="hidden" name="amount" id="prix_total" readonly required>
                            <small id="prix_calcule" class="text-success d-block mt-2" style="display:none;"></small>

                            <!-- Paiement -->
                            <hr>
                            <h5 class="text-dark fw-bold mt-4">💳 Paiement</h5>
                            <div class="mb-3">
                                <label>Numéro de carte</label>
                                <input type="text" name="card_number" class="form-control" placeholder="4111111111111111" value="4111111111111111" required>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label>Mois</label>
                                    <input type="text" name="expiry_month" class="form-control" placeholder="MM" value="08" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label>Année</label>
                                    <input type="text" name="expiry_year" class="form-control" placeholder="YYYY" value="2025" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label>CVV</label>
                                    <input type="text" name="cvv" class="form-control" placeholder="123" value="123" required>
                                </div>
                            </div>

                            <input type="hidden" name="chambre_id" value="{{ $chambre->id }}">
                            <input type="hidden" name="immobilier_id" value="{{ $chambre->immobilier_id }}">

                            <button type="submit" class="btn btn-primary w-100 mt-3">
                                Réserver & Payer
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

                let total = 0;
                if (type === 'jour') total = prixJour * jours;
                else if (type === 'mois') total = prixMois * Math.ceil(jours / 30);
                else if (type === 'annee') total = prixAnnee * Math.ceil(jours / 365);

                if (total > 0) {
                    $('#prix_total').val(total.toFixed(0));
                    $('#prix_calcule').show().text('💰 Montant à payer : ' + total.toLocaleString() + ' FCFA');
                } else {
                    $('#prix_calcule').hide();
                    $('#prix_total').val('');
                }
            }

            $('select[name="type_contrat"], input[name="date_debut"], input[name="date_fin"]').on('change', calculerPrix);

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
