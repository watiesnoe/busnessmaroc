@extends('layouts.app')
@section('titre')
    Offre
@endsection

@section('content')
    <div class="content">

        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded shadow-sm border">
            <div class="block-header bg-light d-flex justify-content-between align-items-center py-3 px-4 rounded-top">
                <h4 class="mb-0 text-primary fw-bold">
                    📋 Liste des offres publiées
                </h4>
                <a href="{{ route('offre.create') }}" class="btn btn-sm btn-success rounded-pill px-3">
                    + Nouvelle offre
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto p-3">
                <table id="offresTable"  class="table table-bordered table-striped table-hover table-vcenter mb-0 w-100">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Entreprise</th>
                            <th>Lieu</th>
                            <th>Date Publication</th>
                            <th>Date Limite</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

        <!-- END Dynamic Table with Export Buttons -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#offresTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("offre.index") }}',
                columns: [
                    { data: 'titre', name: 'titre' },
                    { data: 'type_offre', name: 'type_offre' },
                    { data: 'entreprise', name: 'entreprise' },
                    { data: 'lieu', name: 'lieu' },
                    { data: 'date_publication', name: 'date_publication' },
                    { data: 'date_limite', name: 'date_limite' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                error: function(xhr) {
                    console.error("Erreur AJAX DataTables :", xhr.responseText);
                }
            });
        });
    </script>
@endsection
