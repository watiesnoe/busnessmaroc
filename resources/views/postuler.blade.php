    @extends('layoutsite.site')
    @section('content')
        <div class="container my-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Postuler à l'offre : {{ $offre->titre }}</h4>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                        <form id="candidatureForm" action="{{ route('candidature.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="offre_id" value="{{ $offre->id }}">

                        <div class="mb-3">
                            <label for="cv" class="form-label">CV (fichier PDF obligatoire) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" accept=".pdf" required>
                            @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lettre_motivation" class="form-label">Lettre de motivation (PDF, DOC, DOCX)</label>
                            <input type="file" class="form-control @error('lettre_motivation') is-invalid @enderror" id="lettre_motivation" name="lettre_motivation" accept=".pdf,.doc,.docx">
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
                            <a href="{{ route('details_offre.show', $offre->id) }}" class="btn btn-secondary ms-2">Annuler</a>
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

                    $('#formFeedback').html('');  // Clear previous messages

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,  // Important pour envoyer FormData
                        contentType: false,  // Important pour envoyer FormData
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        beforeSend: function() {
                            // Optionnel : bloquer bouton etc.
                            $('#candidatureForm button[type="submit"]').prop('disabled', true).text('Envoi en cours...');
                        },
                        success: function(response) {
                            $('#formFeedback').html('<div class="alert alert-success">Votre candidature a été envoyée avec succès.</div>');
                            $('#candidatureForm')[0].reset();
                        },
                        error: function(xhr) {
                            if(xhr.status === 422) {
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
                                $('#formFeedback').html('<div class="alert alert-danger">Une erreur est survenue, veuillez réessayer.</div>');
                            }
                        },
                        complete: function() {
                            $('#candidatureForm button[type="submit"]').prop('disabled', false).text('Envoyer la candidature');
                        }
                    });
                });
            });
        </script>

    @endsection
