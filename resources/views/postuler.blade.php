@extends('layoutsite.site')

@section('content')
    <style>
        .bg-offres {
            height: 500px;
            background-image: url('../asset/imgs/Offre-demploi.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            color: #fff;
        }

        .bg-offres::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .offre-card-content {
            position: relative;
            z-index: 2;
        }

        .offre-card-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
        }
    </style>

    {{-- Section d'introduction --}}
    <section class="section-box-2 d-flex align-items-center position-relative text-white"
             style="height: 400px;
            background-image: url('{{ asset('asset/imgs/bg-job.jpg') }}');
            background-size: 800px auto;
            background-repeat: no-repeat;
            background-position: center;">

        <!-- Overlay sombre -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
        </div>

        <!-- Contenu centré -->
        <div class="container position-relative" style="z-index: 2;">
            <div class="p-4 text-center offre-card-content">
                <h2 class="offre-card-title fw-bold fs-2">Votre futur emploi vous attend</h2>
                <p class="lead mt-2 text-white">
                    Parcourez les meilleures opportunités professionnelles, que ce soit près de chez vous ou en télétravail.
                </p>
            </div>
        </div>
    </section>
    {{-- fin du section d'introduction --}}

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Postuler à l'offre : {{ $offre->titre }}</h4>
            </div>
            <div class="card-body">
                <form id="candidatureForm" action="{{ route('candidature.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="offre_id" value="{{ $offre->id }}">

                    <div class="mb-3">
                        <label for="cv" class="form-label">CV (PDF obligatoire) <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="cv" name="cv" accept=".pdf" required>
                    </div>

                    <div class="mb-3">
                        <label for="lettre_motivation" class="form-label">Lettre de motivation (PDF, DOC, DOCX)</label>
                        <input type="file" class="form-control" id="lettre_motivation" name="lettre_motivation"
                               accept=".pdf,.doc,.docx">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message / Commentaire</label>
                        <textarea class="form-control" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Envoyer la candidature</button>
                        <a href="{{ route('details_offre.show', $offre->id) }}" class="btn btn-secondary ms-2">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#candidatureForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    beforeSend: function() {
                        $('#candidatureForm button[type="submit"]').prop('disabled', true).text('Envoi...');
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succès',
                            text: response.message || 'Votre candidature a été envoyée avec succès.',
                            confirmButtonColor: '#198754'
                        });

                        $('#candidatureForm')[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '';
                            $.each(errors, function(key, messages) {
                                $.each(messages, function(index, message) {
                                    errorHtml += '- ' + message + '<br>';
                                });
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur de validation',
                                html: errorHtml,
                                confirmButtonColor: '#dc3545'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: xhr.responseJSON?.message ||
                                    'Une erreur est survenue, veuillez réessayer.',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    },
                    complete: function() {
                        $('#candidatureForm button[type="submit"]').prop('disabled', false)
                            .text('Envoyer la candidature');
                    }
                });
            });
        });
    </script>
@endsection
