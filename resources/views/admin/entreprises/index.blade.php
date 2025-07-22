@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <!-- Navigation -->
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
                        <table id="immobiliers-table" class="table table-bordered table-striped table-vcenter">
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
