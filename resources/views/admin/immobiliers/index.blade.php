@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
          <div class="mb-3 text-end" >
                {{-- <a href="{{ route('immobiliers.create') }}" class="btn btn-primary">Ajouter un Immeuble</a> --}}
                <a href="{{route('immobiliers.create')}}" class="btn btn-primary">Ajouter</a>
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
                <table class="table table-bordered" id="immobilier-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Ville</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
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
            $('#immobilier-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('immobiliers.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'titre', name: 'titre' },
                    { data: 'ville', name: 'ville' },
                    { data: 'prix', name: 'prix' },
                    { data: 'categorie', name: 'categorie', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>

@endsection
