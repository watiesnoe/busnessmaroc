@extends('layouts.app')
@section('titre')
    chambre
@endsection
@section('content')
  <div class="content">
          <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
          <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <div class="mb-3 text-end" >
                {{-- <a href="{{ route('immobiliers.create') }}" class="btn btn-primary">Ajouter un Immeuble</a> --}}
                <a href="{{route('chambres.index')}}" class="btn btn-primary">Voir la liste</a>
            </div>
           <form id="createform" data-action="{{ route('chambres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Validation Form</h3>
   
              </div>
              <div class="block-content block-content-full">
                <!-- Regular -->
                <div class="mb-4">
                    <label class="form-label" for="val-select2">Veuillez selectionner un immobilier <span class="text-danger">*</span></label>
                    <select class="js-select2 form-selec mb-5" id="immobilier_id" name="immobilier_id" style="width: 100%;" data-placeholder="Choose one..">
                    @foreach($immobiliers as $immo)
                        <option value="{{ $immo->id }}">{{ $immo->typeimmeuble }}</option>
                    @endforeach
                </select>
                </div>
            
                 <div id="chambres-wrapper">
                  <div class="chambre-row row ">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Categorie</label>
                            <select name="chambres[0][typechambre]"  class="form-control">
                                <option value="">-- Choisir catégorie --</option>
                                <option value="1">Standard</option>
                                <option value="2">Confort</option>
                                <option value="3">VIP</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Capacité</label>
                            <input type="number" name="chambres[0][capacite]"  class="form-control" placeholder="Capacité" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Statut</label>
                            <select name="chambres[0][statut]" required class="form-control">
                                <option value="disponible">Disponible</option>
                                <option value="reservee">Réservée</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Prix/Jour</label>
                            <input type="number" name="chambres[0][prix_jour]" class="form-control"  placeholder="Prix journalier" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Prix/Mois</label>
                            <input type="number" name="chambres[0][prix_mois]" class="form-control"  placeholder="Prix mensuel" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Prix/Année</label>
                            <input type="number" name="chambres[0][prix_annee]" class="form-control"  placeholder="Prix annuel" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group  mb-2">
                            <label     class="form-label">Description</label>
                            <textarea name="chambres[0][description]"  class="form-control" id="" cols="" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="button"  class="remove-btn btn btn-danger btn-sm float-end" >
                                <span class="fa fa-trash"></span></button>
                        </div>
                    </div>

                </div>
            </div>
             <div class="col  mb-2">
                <button type="button"  class="btn btn-default btn-sm btn-primary" id="addRow"><span class="fa fa-plus"></span> une chambre</button>
                <button type="submit" class="btn btn-default btn-sm btn-primary">Soumettre</button>
            </div>
          </form>
          <!-- jQuery Validation -->

          <!-- Terms Modal -->
    
          <!-- END Terms Modal -->
 </div>
    
@endsection

{{-- <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white  mb-2">
                        <div class="box-padding">
                            <h6 class="color-text-paragraph-2">Contact Information</h6>
                            <form id="createform" data-action="{{ route('chambres.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Choisir un immobilier :</label>
                                 <select class="js-select2 form-select" id="immobilier_id" name="immobilier_id" style="width: 100%;" data-placeholder="Choose one..">
                                    @foreach($immobiliers as $immo)
                                        <option value="{{ $immo->id }}">{{ $immo->typeimmeuble }}</option>
                                    @endforeach
                                </select>

                                <hr>
                                <div id="chambres-wrapper">
                                    
                                </div>

                                <div class="col  mb-2">
                                    <button type="button"  class="btn btn-default btn-sm " id="addRow"><span class="fi fi-rr-plus"></span> une chambre</button>
                                    <button type="submit" class="btn btn-default btn-brand">Soumettre</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div> --}}