@extends('layoutsite.site')
@section('content')
    <div class="container py-4">
        <h3>Étape 3 : Paiement</h3>

        <div class="card p-3 mb-3">
            <p><strong>Type contrat :</strong> {{ ucfirst($data['type_contrat']) }}</p>
            <p><strong>Période :</strong> du {{ $data['date_debut'] }} au {{ $data['date_fin'] }}</p>
            <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
            <p><strong>Email :</strong> {{ $data['email'] }}</p>
            <p><strong>Téléphone :</strong> {{ $data['telephone'] }}</p>
            <h5>Total : {{ $data['prix_total'] }} F</h5>
        </div>

        <div id="paypal-button-container"></div>

        <form id="confirmForm" method="POST" action="{{ route('reservation.confirmer') }}" style="display:none">
            @csrf
            @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <input type="hidden" name="paiement_id" id="paiement_id">
        </form>
    </div>
@endsection
@section('scripts')

        <script src="https://www.paypal.com/sdk/js?client-id=AekLlhlOW2jChm0nd1YZEFLDa2uUroU2yZV-dZOsaHrtf8rmhCDPmOsdmiIu7EsVzewnn2qsqML8egjW&currency=EUR"></script>

        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ number_format($data["prix_total"] / 655, 2) }}' // Conversion FCFA → EUR
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // On capture le paiement et on soumet le formulaire caché
                        document.getElementById('paiement_id').value = details.id;
                        document.getElementById('confirmForm').submit();
                    });
                }
            }).render('#paypal-button-container');
        </script>
    @endsection

