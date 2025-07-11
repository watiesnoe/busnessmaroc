@extends('layouts.app')
@section('titre')
    Immobilier
@endsection
@section('page')
    <a href="{{route('chambres.create')}}" class="btn btn-primary">Ajouter</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white mb-30">
                        <div class="box-padding">
                            <h6 class="color-text-paragraph-2">Contact Information</h6>
                            <table id="chambreFormTable" class="display">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Type Immeuble</th>
                                    <th>Localisation</th>
                                    <th>Statut</th>
                                    <th>Nombre de chambres</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
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
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
                }
            });
        });
    </script>
@endsection
