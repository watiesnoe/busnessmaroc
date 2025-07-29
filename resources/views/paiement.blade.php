@extends('layoutsite.site')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow p-4 border-0 rounded-4">
                    <h3 class="mb-3 text-center">Paiement</h3>
                    <div class="bg-light p-3 rounded mb-3">
                        <p><strong>Type contrat :</strong> {{ ucfirst($data['type_contrat']) }}</p>
                        <p><strong>Période :</strong> du {{ $data['date_debut'] }} au {{ $data['date_fin'] }}</p>
{{--                        <p><strong>Nom :</strong> {{ $data['nom'] }}</p>--}}
{{--                        <p><strong>Email :</strong> {{ $data['email'] }}</p>--}}
{{--                        <p><strong>Téléphone :</strong> {{ $data['telephone'] }}</p>--}}
                        <h5 class="mt-3">Total : {{ $data['prix_total'] }} F</h5>
                    </div>

                    <!-- Formulaire caché pour soumission après paiement -->
                    <form  method="POST"  id="paiement" action="{{ route('paiements.store') }}">
                        @csrf
                        @foreach ($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <!-- Paiement ID si tu l'utilises plus tard -->
                        <button type="submit" class="btn btn-primary w-100">Confirmer la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script >
        $(document).ready(function () {
            $('#paiement').submit(function (e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function (response) {
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

                    },
                    error: function (xhr) {
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
        })
    </script>
{{--    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>--}}

{{--    <script>--}}
{{--            paypal.Buttons({--}}
{{--                createOrder: function(data, actions) {--}}
{{--                    return actions.order.create({--}}
{{--                        purchase_units: [{--}}
{{--                            amount: {--}}
{{--                                value: '{{ number_format($data["prix_total"] / 655, 2) }}' // Conversion FCFA → EUR--}}
{{--                            }--}}
{{--                        }]--}}
{{--                    });--}}
{{--                },--}}
{{--                onApprove: function(data, actions) {--}}
{{--                    return actions.order.capture().then(function(details) {--}}
{{--                        // On capture le paiement et on soumet le formulaire caché--}}
{{--                        document.getElementById('paiement_id').value = details.id;--}}
{{--                        document.getElementById('confirmForm').submit();--}}
{{--                    });--}}
{{--                }--}}
{{--            }).render('#paypal-button-container');--}}
{{--        </script>--}}
    @endsection

