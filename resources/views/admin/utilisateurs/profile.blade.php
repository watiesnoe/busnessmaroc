@extends('layouts.app')

@section('titre')
    Candidats
@endsection

@section('content')
    <div class="content">
        <div id="candidats-container">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        👤 Profil de {{ $user->prenom }} {{ $user->nom }}
                    </h3>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-md-4 text-center">
                            <img class="img-avatar img-avatar96" src="{{ asset('assets/media/avatars/avatar' . rand(1, 10) . '.jpg') }}" alt="">
                            <p class="mt-2 mb-0">
                                <span class="fw-semibold">{{ $user->email }}</span><br>
                                <small class="text-muted">{{ $user->telephone ?? 'Non renseigné' }}</small>
                            </p>
                        </div>
                        <div class="col-md-8">
                            <p><strong>Nom :</strong> {{ $user->nom }}</p>
                            <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
                            <p><strong>Email :</strong> {{ $user->email }}</p>
                            <p><strong>Téléphone :</strong> {{ $user->telephone ?? 'Non renseigné' }}</p>
                            <p><strong>Adresse :</strong> {{ $user->adresse ?? 'Non renseignée' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des candidatures -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">📄 Offres postulées</h3>
                </div>
                <div class="block-content">
                    @forelse($user->candidatures as $candidature)
                        <div class="border rounded p-3 mb-4">
                            <h5 class="mb-1">
                                🏢 Offre : {{ $candidature->offre->titre ?? 'Offre supprimée' }}
                            </h5>
                            <p class="mb-1 text-muted">Postulé le {{ $candidature->created_at->format('d/m/Y') }}</p>

                            <p class="mb-1">
                                <strong>Statut :</strong>
                                @if($candidature->est_approuve)
                                    <span class="badge bg-success">✅ Approuvé</span>
                                @else
                                    <span class="badge bg-warning">⏳ En attente</span>
                                @endif
                            </p>

                            <p class="mb-2"><strong>Note :</strong> {{ $candidature->note ?? 'Non noté' }}/5 ⭐</p>

                            <div class="d-flex gap-2 flex-wrap">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('candidats.cv', $candidature->id) }}" target="_blank">
                                    <i class="fa fa-file-pdf me-1"></i> CV
                                </a>
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('candidats.lettre', $candidature->id) }}" target="_blank">
                                    <i class="fa fa-file-alt me-1"></i> Lettre de motivation
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Ce candidat n’a postulé à aucune offre.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

@endsection
