@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <!-- Navigation -->
        <div class="row">
            <div class="card">
                <div class="card-body ">
                    <div id="horizontal-navigation-hover-normal" class="d-none d-lg-block mt-2 mt-lg-0">
                        <ul class="nav-main nav-main-horizontal nav-main-hover">
                            <li class="nav-main-item">
                                <a class="nav-main-link {{ request()->routeIs('utilisateurs.*') ? 'active' : '' }}"
                                    href="{{ route('utilisateurs.index') }}">
                                    <i class="nav-main-link-icon fa fa-rocket"></i>
                                    <span class="nav-main-link-name">Utilisateurs</span>
                                </a>
                            </li>
                          
                            <li class="nav-main-item">
                                <a class="nav-main-link {{ request()->routeIs('secteurActivites.*') ? 'active' : '' }}"
                                    href="{{ route('secteurActivites.index') }}">
                                    <i class="nav-main-link-icon fa fa-money-bill"></i>
                                    <span class="nav-main-link-name">Secteur d'activité</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                    <i class="nav-main-link-icon fa fa-globe"></i>
                                    <span class="nav-main-link-name">Services</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card mt-2">
                        <div class="card-body border-top border-primary border-1 ">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0 text-primary fw-bold">👥 Liste des secteurs activites</h5>
                               
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
                <div class="col-4">
                      <div class="card mt-2">
                <div class="card-body border-top border-primary border-1 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold"> Ajouter un secteur</h5>

                    </div>

                    <div class="card-body bg-white">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Nom du secteur</label>
                                <input type="text" name="titre" class="form-control  shadow-sm"
                                    placeholder="Ex : Nom du secteur" required>
                            </div>
                            <div class="col-md-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2 shadow">Soumettre</button>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
                </div>
            </div>
        </div>
        <!-- END Navigation -->

    </div>
@endsection
