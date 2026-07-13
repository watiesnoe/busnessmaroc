@extends('layoutsite.site')

@section('content')
    <style>
        /* --- Styles généraux --- */
        .bg-offres {
            height: 500px;
            background-image: url('../asset/imgs/Offre-demploi.png');
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
            background: #d50100;
            color: #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        }

        /* Styles formulaire et prévisualisation */
        .preview-container {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .preview-box {
            flex: 1 1 45%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            min-height: 200px;
            overflow: auto;
        }

        .preview-box object {
            width: 100%;
            height: 200px;
            border-radius: 4px;
        }

        /* Amélioration de la visibilité des textes de saisie */
        .form-control {
            color: #1e293b !important;
            background-color: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
        }
        .form-control:focus {
            color: #0f172a !important;
            background-color: #ffffff !important;
            border-color: var(--brand-navy) !important;
        }
        .form-control::placeholder {
            color: #64748b !important;
        }
    </style>

    {{-- Section d'introduction --}}
    <section class="position-relative text-white d-flex align-items-center py-5"
             style="min-height: 340px; background-image: url('{{ asset('asset/imgs/offre2.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="hero-overlay position-absolute w-100 h-100" style="top:0;left:0;"></div>
        <div class="container position-relative z-2 text-center py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <span class="section-badge bg-white bg-opacity-10 border border-white border-opacity-25 text-white mb-3 d-inline-block" style="letter-spacing:2px;">Candidature</span>
                    <h1 class="display-5 fw-bold text-white mb-2" style="text-shadow:0 2px 16px rgba(0,0,0,0.5);">
                        Postuler à une <span style="color:#f87171;">opportunité</span>
                    </h1>
                    <p class="lead opacity-90 mb-0">Prenez la prochaine étape dans votre carrière professionnelle.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- fin du section d'introduction --}}

    <div class="container my-5">
        <div class="card shadow border-0 rounded-4 overflow-hidden">
            <div class="card-header text-white border-0" style="background: var(--brand-navy); border-bottom: 4px solid var(--brand-red) !important; padding: 1.5rem 2rem;">
                <h4 class="mb-0 fw-bold text-white" style="color: #ffffff !important;"><i class="bi bi-send-fill text-brand-red me-2"></i>Postuler à l'offre : {{ $offre->titre }}</h4>
            </div>
            <div class="card-body p-4 bg-white">

                <form id="candidatureForm" action="{{ route('candidature.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="offre_id" value="{{ $offre->id }}">

                    <div class="row">
                        {{-- CV --}}
                        <div class="col-md-6 mb-3">
                            <label for="cv" class="form-label fw-bold text-navy">CV (fichier PDF obligatoire) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" accept=".pdf" required>
                            <div id="cvPreview" class="preview-box mt-2"></div>
                            @error('cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Lettre de motivation --}}
                        <div class="col-md-6 mb-3">
                            <label for="lettre_motivation" class="form-label fw-bold text-navy">Lettre de motivation (PDF, DOC, DOCX)</label>
                            <input type="file" class="form-control @error('lettre_motivation') is-invalid @enderror" id="lettre_motivation" name="lettre_motivation" accept=".pdf,.doc,.docx">
                            <div id="lettrePreview" class="preview-box mt-2"></div>
                            @error('lettre_motivation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Message / commentaire --}}
                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold text-navy">Message / Commentaire</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end pt-3 border-top mt-4">
                        <button type="submit" class="btn btn-brand px-4 py-2">
                            <i class="bi bi-send me-1"></i> Envoyer la candidature
                        </button>

                        <a href="{{ route('details_offre.show', $offre->uuid ?? $offre->id) }}" class="btn btn-light border px-4 ms-2">
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
        $(document).ready(function () {
            // SweetAlert pour messages de session
            @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: "{{ session('success') }}",
                confirmButtonColor: '#28a745',
                confirmButtonText: 'OK'
            });
            @endif

            @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: "{{ session('error') }}",
                confirmButtonColor: '#d50100',
                confirmButtonText: 'OK'
            });
            @endif

            // Fonction de prévisualisation (déjà dans ton code)
            function previewFile(input, previewId) {
                let file = input.files[0];
                let previewBox = $("#" + previewId);
                previewBox.empty();

                if (file) {
                    let fileURL = URL.createObjectURL(file);
                    let ext = file.name.split('.').pop().toLowerCase();

                    if (ext === "pdf") {
                        previewBox.html('<object data="' + fileURL + '" type="application/pdf" width="100%" height="250px"></object>');
                    }
                    else if (ext === "doc" || ext === "docx") {
                        previewBox.html(
                            '<div class="p-2 border rounded bg-light d-flex align-items-center">' +
                            '<i class="bi bi-file-earmark-word text-primary fs-4 me-2"></i>' +
                            '<span class="me-2">' + file.name + '</span>' +
                            '<a href="' + fileURL + '" target="_blank" class="btn btn-sm btn-outline-primary">Ouvrir</a>' +
                            '</div>'
                        );
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Format non supporté',
                            text: 'Veuillez sélectionner un fichier PDF, DOC ou DOCX.',
                            confirmButtonColor: '#d50100'
                        });
                    }
                }
            }
            // Appels sur changement de fichier
            $("#cv").on("change", function () {
                previewFile(this, "cvPreview");
            });

            $("#lettre_motivation").on("change", function () {
                previewFile(this, "lettrePreview");
            });

        });
    </script>
@endsection

