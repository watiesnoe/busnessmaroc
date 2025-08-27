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

            .badge-custom {
                font-size: 1rem;
                padding: 0.75rem 1.5rem;
                background: #0d6efd;
                color: #fff;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
            }

            /* fin du style pour premier section */
            /* Pour adoucir la carte des secteurs */
            .secteurs-card {
                border-radius: 12px;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
                background: #f8f9fa;
            }

            /* Titres */
            .secteurs-card h5 {
                font-weight: 700;
                letter-spacing: 1px;
                text-transform: uppercase;
                background: #007bff;
                border-radius: 12px 12px 0 0;
            }

            /* Checkbox custom */
            .form-check-input:checked {
                background-color: #007bff;
                border-color: #007bff;
            }

            /* Liste secteurs */
            .secteurs-list li {
                padding: 8px 0;
                border-bottom: 1px solid #dee2e6;
            }

            .secteurs-list li:last-child {
                border-bottom: none;
            }

            /* Animation fadeIn douce */
            .fadeInUp {
                animation: fadeInUp 0.8s ease forwards;
                opacity: 0;
            }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }

                from {
                    opacity: 0;
                    transform: translateY(15px);
                }
            }
        </style>
        {{-- Section d'introduction --}}
        <section class="hero-section position-relative text-white d-flex align-items-center py-5"
            style="
                background-image: url('{{ asset('asset/imgs/offre2.jpg') }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                width: 100%;
                height: 400px;  /* hauteur réduite */
            ">

            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h1 class="display-5 fw-bold mb-3" style="color: #ffffff; text-shadow: 2px 2px 6px rgba(0,0,0,0.7);">
                            <span style="color: #d50100;">Découvrez</span> nos meilleures offres
                        </h1>
                        <p class="lead"
                            style="color: #ffffff; 
                            text-shadow: 1px 1px 5px rgba(0,0,0,0.6); 
                            font-size: 1.5rem;    /* texte plus grand */
                            line-height: 1.8;">
                            Parcourez toutes les opportunités disponibles et trouvez l’offre qui vous correspond le mieux.
                        </p>

                    </div>
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
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form id="candidatureForm" action="{{ route('candidature.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="offre_id" value="{{ $offre->id }}">

                        <div class="mb-3">
                            <label for="cv" class="form-label">CV (fichier PDF obligatoire) <span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv"
                                name="cv" accept=".pdf" required>
                            @error('cv')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lettre_motivation" class="form-label">Lettre de motivation (PDF, DOC, DOCX)</label>
                            <input type="file" class="form-control @error('lettre_motivation') is-invalid @enderror"
                                id="lettre_motivation" name="lettre_motivation" accept=".pdf,.doc,.docx">
                            @error('lettre_motivation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message / Commentaire</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Envoyer la candidature</button>
                            <a href="{{ route('details_offre.show', $offre->id) }}"
                                class="btn btn-outline-secondary px-4 ms-2">
                                <i class="bi bi-arrow-left me-1"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#candidatureForm').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false, // Important pour envoyer FormData
                        contentType: false, // Important pour envoyer FormData
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        beforeSend: function() {
                            // Optionnel : bloquer bouton etc.
                            $('#candidatureForm button[type="submit"]').prop('disabled', true).text(
                                'Envoi en cours...');
                        },
                        success: function(response) {
                            $('#formFeedback').html(
                                '<div class="alert alert-success">Votre candidature a été envoyée avec succès.</div>'
                            );
                            $('#candidatureForm')[0].reset();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                let errorHtml = '<div class="alert alert-danger"><ul>';

                                $.each(errors, function(key, messages) {
                                    $.each(messages, function(index, message) {
                                        errorHtml += '<li>' + message + '</li>';
                                    });
                                });

                                errorHtml += '</ul></div>';
                                $('#formFeedback').html(errorHtml);
                            } else {
                                $('#formFeedback').html(
                                    '<div class="alert alert-danger">Une erreur est survenue, veuillez réessayer.</div>'
                                );
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
