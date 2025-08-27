{{-- resources/views/admin/entreprises/form.blade.php --}}
@extends('layouts.app')

@section('titre')
    Immobilier
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0 text-primary fw-bold">
                            👥 {{ isset($entreprise) ? 'Édition de l’entreprise' : "Espace d'ajout des entreprises" }}
                        </h5>
                    </div>

                    @include('admin.immobiliers.forme')

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#entrepriseForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var url = '{{ isset($entreprise) ? route("entreprises.update", $entreprise->id) : route("entreprises.store") }}';
                var type = '{{ isset($entreprise) ? "PUT" : "POST" }}';

                $.ajax({
                    url: url,
                    type: type,
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: '{{ isset($entreprise) ? "Entreprise mise à jour avec succès !" : "Entreprise ajoutée avec succès !" }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        if(!{{ isset($entreprise) ? 'true' : 'false' }}) {
                            $('#entrepriseForm')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let messages = '';
                        for (let field in errors) {
                            messages += errors[field].join(', ') + '\n';
                        }
                        alert('Erreur:\n' + messages);
                    }
                });
            });
        });
    </script>
@endsection
