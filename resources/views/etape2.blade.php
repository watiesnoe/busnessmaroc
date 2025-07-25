@extends('layoutsite.site')
@section('content')
    <div class="container py-4">
        <h3>Étape 2 : Informations client</h3>

        <form method="POST" action="{{ route('reservation.step3') }}">
            @csrf
            @foreach ($data as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach

            <div class="mb-3">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
            </div>

            <div class="mb-3">
                <label>Téléphone</label>
                <input type="text" name="telephone" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection
