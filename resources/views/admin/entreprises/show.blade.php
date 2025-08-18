{{-- resources/views/admin/entreprises/show.blade.php --}}
@extends('layouts.app')

@section('titre')
    Détails de l'entreprise
@endsection

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm mb-5" >
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Détails de l'entreprise</h5>
                        <a href="{{ route('entreprises.index') }}" class="btn btn-light btn-sm">← Retour</a>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Nom :</strong>
                            <span>{{ $entreprise->nom }}</span>
                        </div>

                        <div class="mb-3">
                            <strong>Email :</strong>
                            <span>{{ $entreprise->email ?? '-' }}</span>
                        </div>

                        <div class="mb-3">
                            <strong>Téléphone :</strong>
                            <span>{{ $entreprise->telephone ?? '-' }}</span>
                        </div>

                        <div class="mb-3">
                            <strong>Adresse :</strong>
                            <span>{{ $entreprise->adresse ?? '-' }}</span>
                        </div>

                        <div class="mb-3">
                            <strong>Secteur :</strong>
                            <span>{{ ucfirst($entreprise->secteur ?? '-') }}</span>
                        </div>

                        <div class="mb-3">
                            <strong>Site web :</strong>
                            @if($entreprise->site_web)
                                <a href="{{ $entreprise->site_web }}" target="_blank">{{ $entreprise->site_web }}</a>
                            @else
                                <span>-</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>Description :</strong>
                            <p>{{ $entreprise->description ?? '-' }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Créée le :</strong>
                            <span>{{ $entreprise->created_at->format('d/m/Y H:i') }}</span>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('entreprises.edit', $entreprise->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('entreprises.destroy', $entreprise->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // SweetAlert pour confirmation de suppression
        $('.delete-form').on('submit', function(e){
            e.preventDefault();
            const form = this;

            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if(result.isConfirmed){
                    form.submit();
                }
            });
        });
    </script>
@endsection
