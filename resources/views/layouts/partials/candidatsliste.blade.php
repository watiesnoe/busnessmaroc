<table class="table table-striped table-hover" id="tableCandidatures">
    <thead class="table-dark">
    <tr>
        <th>Avatar</th>
        <th>Nom complet</th>
        <th>Email</th>
        <th>Candidatures</th> <!-- Nouvelle colonne -->
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
        <tr>
            <td>
                <img class="img-avatar img-avatar32"
                     src="{{ asset('assets/media/avatars/avatar' . rand(1, 10) . '.jpg') }}"
                     alt="Avatar" width="32" height="32">
            </td>
            <td>{{ $user->prenom }} {{ $user->nom }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->total_candidatures }}</td>
            <td class="d-flex flex-wrap gap-1">
                <a class="btn btn-sm btn-alt-primary"
                   href="{{ route('utilisateurs.profile', $user->id) }}">
                    <i class="fa fa-user-circle"></i> Profil
                </a>
                <!-- Si tu veux d’autres actions liées à l’utilisateur -->
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center text-warning">Aucun utilisateur trouvé.</td>
        </tr>
    @endforelse
    </tbody>
</table>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $users->links('pagination::bootstrap-5') }}
</div>
