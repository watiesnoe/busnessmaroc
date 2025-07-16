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
           <form id="createform" data-action="{{ route('immobiliers.update',$immobilier->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
               @method('PUT')

               @include('admin.immobiliers.forme')

           </form>
          <!-- jQuery Validation -->

          <!-- Terms Modal -->

          <!-- END Terms Modal -->
 </div>

@endsection
@section('scripts')
    <script>$(document).ready(function () {
            let index = 1;

            $('#addChambre').on('click', function () {
                $('#chambres-body').append(`
                <tr>
                    <td>
                        <select name="chambres[${index}][type]" class="form-control" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="chambre_simple">Chambre simple</option>
                            <option value="chambre_double">Chambre double</option>
                            <option value="studio">Studio</option>
                            <option value="suite">Suite</option>
                            <option value="chambre_partagee">Chambre partagée</option>
                            <option value="dortoir">Dortoir</option>
                            <option value="chambre_deluxe">Chambre deluxe</option>
                            <option value="chambre_familiale">Chambre familiale</option>
                            <option value="appartement">Appartement</option>
                            <option value="bungalow">Bungalow</option>
                            <option value="villa">Villa</option>
                            <option value="mezzanine">Chambre mezzanine</option>
                        </select>
                    </td>
                    <td><input type="number" name="chambres[${index}][capacite]" class="form-control" required></td>
                    <td>
                        <input type="number" name="chambres[${index}][prix_jour]" class="form-control mb-1" placeholder="Jour">
                        <input type="number" name="chambres[${index}][prix_mois]" class="form-control mb-1" placeholder="Mois">
                        <input type="number" name="chambres[${index}][prix_annee]" class="form-control" placeholder="Année">
                    </td>
                    <td>
                        <select name="chambres[${index}][statut]" class="form-control" required>
                            <option value="disponible">Disponible</option>
                            <option value="reservee">Réservée</option>
                            <option value="occupee">Occupée</option>
                        </select>
                    </td>
                    <td><textarea name="chambres[${index}][description]" class="form-control"></textarea></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-chambre">X</button></td>
                </tr>
            `);
                index++;
            });

            $(document).on('click', '.remove-chambre', function () {
                if(index>1){
                    $(this).closest('tr').remove();
                    index--
                }

            });

            });
    </script>
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
