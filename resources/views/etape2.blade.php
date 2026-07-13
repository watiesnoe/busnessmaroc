@extends('layoutsite.site')

@section('titre', 'Étape 2 : Confirmation des informations — Business Maroc')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden bg-white">
                <div class="card-header text-white border-0 py-3" style="background: var(--brand-navy); border-bottom: 4px solid var(--brand-red) !important;">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-person-check me-2 text-brand-red"></i>Étape 2 : Informations client</h5>
                </div>
                <div class="card-body p-4 text-center">
                    <p class="text-muted mb-4">
                        Vous êtes connecté en tant que <strong>{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</strong>.<br>
                        Cliquez sur Valider pour finaliser votre réservation.
                    </p>

                    <form method="POST" action="{{ route('reservation.step3') }}">
                        @csrf
                        @foreach ($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <div class="d-grid">
                            <button type="submit" class="btn btn-brand py-2">
                                <i class="bi bi-check-circle me-1"></i> Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
