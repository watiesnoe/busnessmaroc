@extends('layouts.app')
@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <!-- Navigation -->
        <div class="row">
            <div class="card">
                <div class="card-body">
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
            <div class="card mt-2">
                <div class="card-body  ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">👥 Liste des utilisateurs</h5>
                        <a href="{{ route('utilisateurs.create') }}" class="btn btn-success btn-sm rounded-pill shadow-sm">
                            + Ajouter un utilisateur
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
