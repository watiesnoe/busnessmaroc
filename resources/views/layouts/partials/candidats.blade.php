<div class="row">
    @forelse ($candidats as $candidat)
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="block block-rounded text-center h-100">
                <div class="block-content block-content-full bg-image"
                     style="background-image: url('{{ asset('assets/media/photos/photo' . rand(1, 20) . '.jpg') }}'); height: 120px;">
                    <img class="img-avatar img-avatar-thumb mt-5"
                         src="{{ asset('assets/media/avatars/avatar' . rand(1, 10) . '.jpg') }}"
                         alt="Avatar candidat">
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="fw-semibold">{{ $candidat->prenom }} {{ $candidat->nom }}</div>
                    <div class="fs-sm text-muted">{{ $candidat->email }}</div>
                </div>
                <div class="block-content block-content-full d-flex justify-content-center gap-2 flex-wrap">
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('candidats.cv', $candidat->id) }}" target="_blank" title="Voir le CV">
                        <i class="fa fa-file-pdf me-1"></i> CV
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('candidats.lettre', $candidat->id) }}" target="_blank" title="Voir la lettre de motivation">
                        <i class="fa fa-file-alt me-1"></i> Lettre
                    </a>
                    <a class="btn btn-sm btn-alt-primary" href="{{ route('utilisateurs.show', $candidat->id) }}">
                        <i class="fa fa-user-circle me-1"></i> Profil
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                Aucun candidat trouvé.
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $candidats->links('pagination::bootstrap-5') }}
</div>
