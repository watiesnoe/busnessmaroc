@extends('layoutsite.site')
@section('content')
    {{-- premier section  --}}

    <section class="section-box-2 position-relative text-white d-flex align-items-center"
        style="
    height: 400px;
    background-image: url('{{ asset('asset/imgs/bg-job.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;">

        <!-- Overlay sombre -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
        </div>

        <!-- Contenu centré -->
        <div class="container position-relative text-center" style="z-index: 2;">
            <div class="p-4 offre-card-content">

                <h2 class="offre-card-title fw-bold fs-2">Réservez votre chambre idéale dès aujourd’hui</h2>
                <p class="lead mt-2">Choisissez parmi nos logements confortables et flexibles selon vos besoins.</p>
            </div>
        </div>
    </section>
    {{-- fin du section --}}
    {{-- partie content --}}
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-credit-card fs-4"></i>
                        </div>
                        <h3 class="mt-3">Résumé de votre réservation</h3>
                        <p class="text-muted">Vérifiez les détails avant de confirmer</p>
                    </div>

                    <div class="bg-light rounded-4 p-3 mb-4">
                        <p><strong>Type de contrat :</strong> {{ ucfirst($data['type_contrat']) }}</p>
                        <p><strong>Période :</strong> du {{ $data['date_debut'] }} au {{ $data['date_fin'] }}</p>

                        <div class="bg-white shadow-sm p-3 rounded-3 mt-3 text-center">
                            <h5 class="text-primary">Prix estimé</h5>
                            <h2 class="fw-bold text-dark">{{ $data['prix_total'] }} F CFA</h2>
                        </div>
                    </div>

                    <form id="paiement" method="POST" action="{{ route('paiements.store') }}">
                        @csrf
                        @foreach ($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <button type="submit" class="btn btn-primary w-100 py-2 mt-2">
                            <i class="bi bi-check-circle me-2"></i> Confirmer la réservation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- fin content --}}
@endsection
@section('scripts')
    {{--        <script src="https://www.paypal.com/sdk/js?client-id=AekLlhlOW2jChm0nd1YZEFLDa2uUroU2yZV-dZOsaHrtf8rmhCDPmOsdmiIu7EsVzewnn2qsqML8egjW&currency=EUR"></script> --}}

    {{--        <script> --}}
    {{--            paypal.Buttons({ --}}
    {{--                createOrder: function(data, actions) { --}}
    {{--                    return actions.order.create({ --}}
    {{--                        purchase_units: [{ --}}
    {{--                            amount: { --}}
    {{--                                value: '{{ number_format($data["prix_total"] / 655, 2) }}' // Conversion FCFA → EUR --}}
    {{--                            } --}}
    {{--                        }] --}}
    {{--                    }); --}}
    {{--                }, --}}
    {{--                onApprove: function(data, actions) { --}}
    {{--                    return actions.order.capture().then(function(details) { --}}
    {{--                        // On capture le paiement et on soumet le formulaire caché --}}
    {{--                        document.getElementById('paiement_id').value = details.id; --}}
    {{--                        document.getElementById('confirmForm').submit(); --}}
    {{--                    }); --}}
    {{--                } --}}
    {{--            }).render('#paypal-button-container'); --}}
    {{--        </script> --}}
    <script>
        $(document).ready(function() {
            $('#paiement').submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            // Redirection après le succès
                            window.location.href = "{{ route('homesite.index') }}";
                        });
                        form[0].reset();
                        // $('#prix_calcule').hide();
                        // $('#prix_total').val('');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        let msg = 'Une erreur est survenue.';

                        if (errors) {
                            msg = Object.values(errors).flat().join("\n");
                        } else if (xhr.responseJSON?.message) {
                            msg = xhr.responseJSON.message;
                        }

                        alert(msg);
                    }
                });
            });
        });
    </script>
@endsection
