@extends('layouts.app')
@section('titre')
    Client
@endsection

@section('content')
    <div class="content">
        <!-- Navigation -->
        <div class="row">

            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">👥 Liste des clients</h5>
                    </div>

                    <div class="block-content block-content-full overflow-x-auto">
                        <table id="clients-table" class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Statut</th>
                                <th>Date de création</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Navigation -->

    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#clients-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('utilisateurs.clients') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'statut', name: 'statut', orderable: false, searchable: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                // language: {
                //     url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
                // }
            });
        });
    </script>
@endsection
