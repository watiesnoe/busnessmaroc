@extends('layouts.app')
@section('titre', 'Liste des universités')

@section('content')
    <div class="content">
        <div class="row">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">🏫 Liste des universités</h5>
                        <a href="{{ route('universites.create') }}" class="btn btn-success btn-sm rounded-pill shadow-sm">
                            + Ajouter une université
                        </a>
                    </div>

                    <div class="block-content block-content-full overflow-x-auto">
                        <table id="universites-table" class="table table-bordered table-striped table-vcenter" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Ville</th>
                                <th>Pays</th>
                                <th>Filières</th>
                                <th>Actions</th> {{-- Nouvelle colonne --}}
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
            $('#universites-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('adminuniversite.index_admin') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nom', name: 'nom' },
                    { data: 'ville', name: 'ville' },
                    { data: 'pays', name: 'pays' },
                    { data: 'filieres', name: 'filieres', orderable: false, searchable: false },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }, // Colonne Actions
                ],
                language: {
                    // url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
                }
            });
        });
    </script>
@endsection
