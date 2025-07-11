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
                    <div class="panel-white mb-5">
                        <div class="box-padding">
                            <h6 class="color-text-paragraph-2">Contact Information</h6>
                            <form id="createform" data-action="{{ route('chambres.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Choisir un immobilier :</label>
                                <select name="immobilier_id" class="form-control" id="immobilier_id" required>
                                    @foreach($immobiliers as $immo)
                                        <option value="{{ $immo->id }}">{{ $immo->typeimmeuble }}</option>
                                    @endforeach
                                </select>

                                <hr>
                                <div id="chambres-wrapper">
                                    <div class="chambre-row row ">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Categorie</label>
                                                <select name="chambres[0][typechambre]"  class="form-control">
                                                    <option value="">-- Choisir catégorie --</option>
                                                    <option value="1">Standard</option>
                                                    <option value="2">Confort</option>
                                                    <option value="3">VIP</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Capacité</label>
                                                <input type="number" name="chambres[0][capacite]"  class="form-control" placeholder="Capacité" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Statut</label>
                                                <select name="chambres[0][statut]" required class="form-control">
                                                    <option value="disponible">Disponible</option>
                                                    <option value="reservee">Réservée</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Prix/Jour</label>
                                                <input type="number" name="chambres[0][prix_jour]" class="form-control"  placeholder="Prix journalier" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Prix/Mois</label>
                                                <input type="number" name="chambres[0][prix_mois]" class="form-control"  placeholder="Prix mensuel" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Prix/Année</label>
                                                <input type="number" name="chambres[0][prix_annee]" class="form-control"  placeholder="Prix annuel" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group mb-5">
                                                <label class="font-sm color-text-mutted mb-10">Description</label>
                                                <textarea name="chambres[0][description]"  class="form-control" id="" cols="" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button type="button"  class="remove-btn btn btn-danger btn-sm float-end" >
                                                    <span class="fi fi-rr-trash"></span></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col mb-5">
                                    <button type="button"  class="btn btn-default btn-sm " id="addRow"><span class="fi fi-rr-plus"></span> une chambre</button>
                                    <button type="submit" class="btn btn-default btn-brand">Soumettre</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

