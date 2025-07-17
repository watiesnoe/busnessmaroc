@extends('layouts.app')
@section('titre')
    Immobilier
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
                <table id="immobiliers-table" class="table table-bordered table-striped table-hover table-vcenter mb-0 w-100">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 3%;">#</th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Secteur</th>
                            <th>Entreprise</th>
                            <th>Date limite</th>
                            <th>Statut</th>
                            <th style="width: 12%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Les données seront chargées via DataTables --}}
                    </tbody>
                </table>
            </div>
        </div>

        <!-- END Dynamic Table with Export Buttons -->
    </div>
@endsection
