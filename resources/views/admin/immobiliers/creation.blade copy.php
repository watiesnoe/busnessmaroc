@extends('layouts.app')
@section('titre')
    Immobilier
@endsection
@section('page')
    <a href="{{route('immobiliers.index')}}" class="btn btn-primary">Liste</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white mb-30">

                        <div class="box-padding">
                            <form id="createform" data-action="{{ route('immobiliers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group mb-5">
                                            <label class="font-sm color-text-mutted mb-10">Description <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="description" placeholder="Description"><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group mb-5">
                                            <label class="font-sm color-text-mutted mb-10">Type   appartement <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" name="typeimmeuble" placeholder="Type"><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group mb-5">
                                            <label class="font-sm color-text-mutted mb-10">Localisation</label>
                                            <input  type="text"  class="form-control" name="localisation" placeholder="Localisation"><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-5">
                                            <label class="font-sm color-text-mutted mb-10">Statut</label>
                                            <select name="statut" class="form-control">
                                                <option value="available">Disponible</option>
                                                <option value="sold">Vendu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group mb-5">
                                            <label class="font-sm color-text-mutted mb-10">Album</label>
                                            <input type="file" class="form-control"  name="images[]" multiple>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mt-10">
                                            <button class="btn btn-default btn-brand ">Ajouter</button>
                                        </div>
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
        $('#createform').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('immobiliers.store') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    // console.log('Success:', res);
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: res.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#immobilierForm')[0].reset();
                },
                error: function(err) {
                    // console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Erreur lors de l\'enregistrement'
                    });
                }
            });
        });
    </script>
@endsection
