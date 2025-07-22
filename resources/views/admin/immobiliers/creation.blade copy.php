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
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Validation Form</h3>
   
              </div>
              <div class="block-content block-content-full">
                <!-- Regular -->
            
                <div class="row items-push">
                    <div class="mb-4 col-6">
                        <label class="form-label">Description <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="description" placeholder="Description">
                    </div>
                    <div class="mb-4 col-6">
                        <label    class="form-label">Type   appartement <span class="text-danger">*</span></label>
                        <input type="text"  class="form-control" name="typeimmeuble" placeholder="Type">
                    </div>
                    <div class="mb-4 col-6">
                            <label    class="form-label">Localisation</label>
                            <input  type="text"  class="form-control" name="localisation" placeholder="Localisation">
                    </div>
                    <div class="mb-4 col-6">
                        <label    class="form-label">Album</label>
                        <input type="file" class="form-control"  name="images[]" multiple>
                    </div>
                 
                    <div class="row ">
                        <div class="col-12 text-end ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
             
              </div>
            </div>
          </form>
          <!-- jQuery Validation -->

          <!-- Terms Modal -->
    
          <!-- END Terms Modal -->
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
