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
                <table id="chambreFormTable" class="table table-bordered table-striped table-vcenter ">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Type Immeuble</th>
                            <th>Localisation</th>
                            <th>Statut</th>
                            <th>Nombre de chambres</th>
                            <th width="15%" >Action</th>
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
            $('#chambreFormTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("chambres.index") }}',
                            columns: [
                    { data: 'description', name: 'description' },
                    { data: 'typeimmeuble', name: 'typeimmeuble' },
                    { data: 'localisation', name: 'localisation' },
                    { data: 'statut', name: 'statut' },
                    { data: 'chambres_count', name: 'chambres_count', searchable: false, orderable: false },
                    {
                        data: 'id',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return `
                                <a href="#"><span class="btn-edit btn btn-primary btn-sm" data-id="${data}"><i class="fa fa-pencil-alt"></i></span></a>
                                <a href="#"><span class="btn-delete btn btn-danger btn-sm" data-id="${data}"><i class="fa fa-trash"></i></span></a>
                            `;
                        }
                    }
                ]
               
            });
        });
    </script>
@endsection
