@extends('layouts.app')

@section('titre')
    Candidats
@endsection

@section('content')
    <div class="content">
        <div id="candidats-container">
            <div class="content">
                <table class="table table-striped table-hover" id="tableCandidatures" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>Avatar</th>
                        <th>Nom complet</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Candidatures</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#candidats-container .pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                fetchCandidats(url);
            });

            function fetchCandidats(url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#candidats-container').html(data);
                    },
                    error: function() {
                        alert('Erreur lors du chargement des candidats.');
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tableCandidatures').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("utilisateurs.candidats") }}',
                columns: [
                    { data: 'avatar', name: 'avatar', orderable: false, searchable: false },
                    { data: 'prenom', name: 'users.prenom' },
                    { data: 'nom', name: 'users.nom' },
                    { data: 'email', name: 'users.email' },
                    {
                        data: 'total_candidatures',
                        name: 'total_candidatures', // c’est une colonne calculée, donc attention
                        orderable: true,
                        searchable: false // 🔴 TRÈS IMPORTANT pour corriger ton bug
                    },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection
