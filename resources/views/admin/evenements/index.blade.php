@extends('layouts.app')
@section('titre', 'Liste des événements')

@section('content')
    <div class="content">
        <div class="row">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">🎉 Liste des événements</h5>
                        <a href="{{ route('evenements.create') }}" class="btn btn-success btn-sm rounded-pill shadow-sm">
                            + Ajouter un événement
                        </a>
                    </div>

                    <div class="block-content block-content-full overflow-x-auto">
                        <table id="evenements-table" class="table table-bordered table-striped table-vcenter" style="width:100%">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Lieu</th>
                                <th>Prix ticket</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#evenements-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('evenements.index') }}",
            columns: [
                { data: 'titre', name: 'titre' },
                { data: 'date_debut', name: 'date_debut' },
                { data: 'date_fin', name: 'date_fin' },
                { data: 'lieu', name: 'lieu' },
                { data: 'prix_ticket', name: 'prix_ticket' },
                { data: 'statut', name: 'statut' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
            language: {
                // url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
            }
        });
    });
</script>
@endsection
