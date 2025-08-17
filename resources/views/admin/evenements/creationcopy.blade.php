@extends('layouts.app')
@section('titre')
    Immobilier
@endsection
@section('page')
    <a href="{{route('chambres.create')}}">Ajouter</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white mb-30">
                        <div class="box-padding">
                            <h6 class="color-text-paragraph-2">Contact Information</h6>
                            <div class="form-group mt-10 d-flex" style="float: right;">
                                <button type="button"  class="btn btn-default btn-brand " id="addRow">Ajouter une chambre</button><br><br>
                            </div>
                            <form id="chambreForm">
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
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">typechambre</label>
                                                <input type="text" name="chambres[0][typechambre]" class="form-control"  placeholder="Type" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Prix</label>
                                                <input type="number" name="chambres[0][prix]" class="form-control"  placeholder="Prix" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Capacité</label>
                                                <input type="number" name="chambres[0][capacite]"  class="form-control" placeholder="Capacité" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Description</label>
                                                <input type="text" name="chambres[0][description]" placeholder="Description" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-30">
                                                <label class="font-sm color-text-mutted mb-10">Statut</label>
                                                <select name="chambres[0][statut]" required class="form-control">
                                                    <option value="disponible">Disponible</option>
                                                    <option value="reservee">Réservée</option>
                                                    <option value="indisponible">Indisponible</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group align-content-center" style="float: right;">
                                                <button type="button" class="remove-btn  btn btn-default btn-brand">Supprimer</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mt-10 ">
                                        <button type="submit" class="btn btn-default btn-brand">Soumettre</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script>
        let index = 1;

        // Ajouter une ligne
        $('#addRow').click(function () {
            $('#chambres-wrapper').append(`
            <div class="chambre-row row">
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-30">
                        <label class="font-sm color-text-mutted mb-10">typechambre</label>
                        <input type="text"class="form-control" name="chambres[${index}][typechambre]" placeholder="Type" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-30">
                        <label class="font-sm color-text-mutted mb-10">typechambre</label>
                      <input type="number"class="form-control" name="chambres[${index}][prix]" placeholder="Prix" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-30">
                        <label class="font-sm color-text-mutted mb-10">typechambre</label>
                        <input type="number"  class="form-control" name="chambres[${index}][capacite]" placeholder="Capacité" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-30">
                        <label class="font-sm color-text-mutted mb-10">typechambre</label>
                         <input type="text" class="form-control" name="chambres[${index}][description]" placeholder="Description" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="form-group mb-30">
                         <label class="font-sm color-text-mutted mb-10">Etat</label>
                        <select class="form-control" name="chambres[${index}][statut]" required>
                            <option value="disponible">Disponible</option>
                            <option value="reservee">Réservée</option>
                            <option value="indisponible">Indisponible</option>
                        </select>
                    </div>
                </div>
               <div class="col-lg-12">
                    <div class="form-group mt-10">
                       <button class="btn remove-btn btn-default btn-brand icon-tick">Supprimer</button>
                    </div>
               </div>

            </div>
        `);
            index++;
        });

        // Supprimer une ligne
        $(document).on('click', '.remove-btn', function () {
            $(this).parent().remove();
        });

        // Soumission AJAX
        $('#chambreForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('chambres.store') }}",
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (res) {
                    $('#message').text(res.message).css('color', 'green');
                    $('#chambreForm')[0].reset();
                    $('#chambres-wrapper').html(`
                    <div class="chambre-row row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-30">
                                <label class="font-sm color-text-mutted mb-10">typechambre</label>
                                <input type="text" name="chambres[0][typechambre]" placeholder="Type" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-30">
                                <label class="font-sm color-text-mutted mb-10">typechambre</label>
                              <input type="number" name="chambres[0][prix]" placeholder="Prix" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-30">
                                <label class="font-sm color-text-mutted mb-10">Capacité</label>
                                <input type="number" name="chambres[0][capacite]" placeholder="Capacité" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-30">
                                <label class="font-sm color-text-mutted mb-10">Description</label>
                                <input type="text" name="chambres[0][description]" placeholder="Description" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-30">
                                <select name="chambres[0][statut]" required>
                                    <option value="disponible">Disponible</option>
                                    <option value="reservee">Réservée</option>
                                    <option value="indisponible">Indisponible</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="remove-btn">Supprimer</button>
                    </div>
                `);
                    index = 1;
                },
                error: function (xhr) {
                    $('#message').text('Erreur lors de l’enregistrement.').css('color', 'red');
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endsection
