@extends('layoutsite.site')
@section('content')
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-primary text-white">💳 Paiement Test Authorize.Net (Sandbox)</div>
            <div class="card-body">
                <form action="{{ route('payment.charge') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Montant USD</label>
                        <input type="number" name="amount" class="form-control" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label>Numéro de carte</label>
                        <input type="text" name="card_number" class="form-control" placeholder="4111111111111111" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Mois d’expiration</label>
                            <input type="text" name="expiry_month" class="form-control" placeholder="MM" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Année d’expiration</label>
                            <input type="text" name="expiry_year" class="form-control" placeholder="YYYY" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>CVV</label>
                        <input type="text" name="cvv" class="form-control" placeholder="123" required>
                    </div>

                    <button type="submit" class="btn btn-success">Payer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
