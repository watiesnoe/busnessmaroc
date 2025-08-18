@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">🏢 Liste des entreprises</h5>
                        <a href="{{ route('entreprises.create') }}" class="btn btn-success btn-sm rounded-pill shadow-sm">
                            + Ajouter une entreprise
                        </a>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table id="entreprises-table" class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Date de création</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#entreprises-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('entreprises.index') }}",
                columns: [
                    { data: 'nom', name: 'nom' },
                    { data: 'email', name: 'email' },
                    { data: 'telephone', name: 'telephone' },
                    { data: 'adresse', name: 'adresse' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // ✅ Suppression AJAX
            $(document).on('click', '.delete-btn', function(){
                let id = $(this).data('id');
                if(confirm("Voulez-vous vraiment supprimer cette entreprise ?")) {
                    $.ajax({
                        url: '/entreprises/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#entreprises-table').DataTable().ajax.reload();
                            alert("Entreprise supprimée !");
                        },
                        error: function() {
                            alert("Erreur lors de la suppression !");
                        }
                    });
                }
            });
        });
    </script>
@endsection
