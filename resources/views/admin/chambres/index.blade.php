@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
  <div class="content">
          <div class="mb-3 text-end" >
                {{-- <a href="{{ route('immobiliers.create') }}" class="btn btn-primary">Ajouter un Immeuble</a> --}}
                <a href="{{route('chambres.create')}}" class="btn btn-primary">Ajouter</a>
            </div>
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Dynamic Table <small>Export Buttons</small>
                </h3>
            </div>
            <div class="block-content block-content-full overflow-x-auto">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered" id="chambres-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Capacité</th>
                        <th>Prix Jour</th>
                        <th>Statut</th>
                        <th>Bien</th>
                        <th>Catégorie</th>
                        <th>Ville</th>
                        <th>Action</th>
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
            $('#chambres-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('chambres.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'type', name: 'type' },
                    { data: 'capacite', name: 'capacite' },
                    { data: 'prix_jour', name: 'prix_jour' },
                    { data: 'statut', name: 'statut' },
                    { data: 'immobilier', name: 'immobilier', orderable: false },
                    { data: 'categorie', name: 'categorie', orderable: false },
                    { data: 'ville', name: 'ville', orderable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection
