@extends('layouts.app')
@section('titre')
    Immobilier
@endsection
@section('page')
    <a href="{{route('immobiliers.index')}}" class="btn btn-primary">Liste</a>
@endsection
@section('content')

        <div class="content">
          <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
          <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <div class="mb-3 text-end" >
                {{-- <a href="{{ route('immobiliers.create') }}" class="btn btn-primary">Ajouter un Immeuble</a> --}}
                <a href="{{route('immobiliers.index')}}" class="btn btn-primary">Voir la liste</a>
            </div>
          <form class="js-validation" id="createform" data-action="{{ route('immobiliers.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
              @include('admin.immobiliers.forme')
          </form>
          <!-- jQuery Validation -->

          <!-- Terms Modal -->

          <!-- END Terms Modal -->
        </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
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
                        <td>
                            <input type="number" name="chambres[${index}][capacite]" class="form-control" required>
                        </td>
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
                        <td>
                            <textarea name="chambres[${index}][description]" class="form-control"></textarea>
                        </td>
                        <td>
                            <input type="file" name="chambres[${index}][image]" class="form-control" accept="image/*">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm remove-chambre">X</button>
                        </td>
                    </tr>`);
                index++;
            });

            $(document).on('click', '.remove-chambre', function () {
                  $(this).closest('tr').remove();

            });
        });
    </script>
@endsection
