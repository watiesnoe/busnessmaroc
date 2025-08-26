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
            /* assombrit pour améliorer la lisibilité */
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
            background: #d50100;
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
    <section class="section-box-2 d-flex align-items-center position-relative text-white"
        style="height: 400px;
                background-image: url('{{ asset('asset/imgs/bg-job.jpg') }}');
                background-size: 800px auto;
                background-repeat: no-repeat;
                background-position: center;">

        <!-- Overlay sombre -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
        </div>

        <!-- Contenu centré -->
        <div class="container position-relative" style="z-index: 2;">
            <div class="p-4 text-center offre-card-content">
                <div class="mb-3">

                </div>
                <div class="container position-relative" style="z-index: 2;">
                    <div class="p-4 text-center offre-card-content">
                        <div class="mb-3">
                            <!-- Vous pouvez ajouter une icône ou une image ici si nécessaire -->
                        </div>
                        <h2 class="offre-card-title fw-bold fs-2">Votre futur emploi vous attend</h2>
                        <p class="lead mt-2 text-white">Parcourez les meilleures opportunités professionnelles, que ce soit
                            près de chez vous ou en télétravail.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- fin du section d'introduction --}}
    {{-- Section principale --}}
    <section class="section-box mt-5">
        <div class="container-fluid px-3 px-md-5">
            <div class="row justify-content-center" style="max-width: 90%; margin: auto;">

                <!-- Secteurs : mobile en haut (order 1), desktop à gauche (order-lg-1) -->
                <div class="col-lg-3 col-md-12 col-12 fadeInUp order-1 order-lg-1">
                    <div class="card secteurs-card p-4 h-auto">
                      <h5 class="text-white text-center py-3 mb-4">Secteurs d'activité</h5>

                        <ul class="list-unstyled secteurs-list">
                            @php
                                $secteurs = [
                                    'Informatique',
                                    'Finance',
                                    'Éducation',
                                    'Santé',
                                    'Tourisme',
                                    'Commerce',
                                    'Industrie',
                                ];
                            @endphp
                            @foreach ($secteurs as $secteur)
                                <li>
                                    <label class="form-check d-flex align-items-center mb-0">
                                        <input class="form-check-input me-3 secteur-checkbox" type="checkbox"
                                            value="{{ $secteur }}">
                                        <span class="user-select-none">{{ $secteur }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Liste offres : mobile en bas (order 2), desktop à droite (order-lg-2) -->
                <div class="col-lg-9 col-md-12 col-12 fadeInUp order-2 order-lg-2">
                    <div class="content-page">
                        <div class="row g-4" id="offres-list">
                            @include('layoutsite.partials.liste')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- fin du section --}}
@endsection
    @section('scripts')
        <script>
            function chargerOffres(page = 1) {
                let secteurs = [];
                $('.secteur-checkbox:checked').each(function () {
                    secteurs.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('offres.filtrer') }}",
                    method: "GET",
                    data: {
                        secteurs: secteurs,
                        page: page
                    },
                    success: function (response) {
                        $('#offres-list').html(response);
                    },
                    error: function (xhr) {
                        console.error("Erreur de chargement :", xhr.responseText);
                    }
                });
            }

            $(document).ready(function () {
                // Filtrage par checkbox
                $('.secteur-checkbox').on('change', function () {
                    chargerOffres(1); // recharger depuis la page 1
                });

                // Pagination AJAX
                $(document).on('click', '.pagination a', function (e) {
                    e.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    chargerOffres(page);
                });
            });
        </script>

@endsection
