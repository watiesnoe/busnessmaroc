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
                <div class="card-body ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">👥 Espace d'ajout des utilisateurs</h5>

                    </div>
                    <div class="card-body bg-white">
                        <div class="row g-3">


                            <div class="col-md-4">
                                <label class="form-label"> Nom & Prénom </label>
                                <input type="text" name="prenom" class="form-control shadow-sm"
                                    placeholder="Ex : Aminata" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Adresse e-mail</label>
                                <input type="email" name="email" class="form-control shadow-sm"
                                    placeholder="Ex : aminata@example.com" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" name="telephone" class="form-control shadow-sm"
                                    placeholder="Ex : 76 00 00 00" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Rôle</label>
                                <select name="role" class="form-select shadow-sm" required>
                                    <option value="">-- Choisir le rôle --</option>
                                    <option value="admin">Administrateur</option>
                                    <option value="agent">Agent</option>
                                    <option value="client">Client</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" class="form-control shadow-sm" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control shadow-sm" required>
                            </div>

                            <div class="col-md-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2 shadow">Soumettre</button>
                                <a href="{{ route('utilisateurs.index') }}" class="btn btn-info px-4 py-2 shadow">Voir la
                                    liste</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- END Navigation -->

    </div>
@endsection
