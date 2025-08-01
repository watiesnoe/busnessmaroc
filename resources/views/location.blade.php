<style>
    /* contenus de la page */
    .section-box {
        padding: 40px 0;
        background-color: #f9f9f9;
    }

    .content-page {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .box-filters-job {
        padding-bottom: 20px;
        border-bottom: 1px solid #e0e0e0;
        margin-bottom: 30px;
    }


    @media (max-width: 768px) {
        .box-filters-job {
            text-align: center;
        }

        .display-flex2 {
            justify-content: center;
            flex-wrap: wrap;
        }

        .view-type img {
            margin: 0 5px;
        }

        @media (max-width: 768px) {
            .sidebar-filters {
                background: #f8f9fa;
                padding: 10px;
                border-radius: 10px;
            }
        }

    }
</style>
@extends('layoutsite.site')
@section('content')
    <!-- SECTION HERO AVEC HAUTEUR AJUSTÉE -->
    <section class="section-box-2 position-relative bg-location" style="height: 50vh; overflow: hidden;">
        <img src="{{ asset('asset/imgs/location1.jpg') }}" alt="Maison"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                object-fit: cover; z-index: 0;" />
        <div class="container">
            <!-- Contenu centré avec padding -->
            <div class="block-banner d-flex flex-column justify-content-center align-items-center text-center position-relative"
                style="height: 100%; padding: 0 15px; z-index: 2; color: #eee; text-shadow: 0 2px 8px rgba(0,0,0,0.8); ">

                <h1 class="display-4 fw-bold mb-4 wow animate__animated animate__fadeInDown text-white mt-5">
                    <span class="text-primary">Louez</span> en toute simplicité <br class="d-none d-md-block"> votre
                    prochain logement
                </h1>
                <p class="lead text-white mb-5 wow animate__animated animate__fadeInUp"
                    style="text-shadow: 1px 1px 6px rgba(0,0,0,0.6);">
                    Trouvez rapidement une maison, un appartement ou un immeuble adapté à vos besoins. Offres vérifiées,
                    recherche simplifiée.
                </p>

            </div>
        </div>

    </section>
    {{-- section principale --}}
    <section class="section-box mt-50">
        <div class="section-box wow animate__animated animate__fadeIn">
            <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
                <div class="row gx-5 mx-auto" style="max-width: 95%;">

                    <!-- Filtres : ordre 0 en mobile (en haut) + marge-bottom en mobile uniquement -->
                    <div class="col-12 col-lg-3 order-0 mb-4 mb-lg-0">
                        <div class="sidebar-filters p-3 shadow rounded bg-white">
                            <div class="filter-block head-border mb-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Filtres avancés</h5>
                                <a class="link-reset text-decoration-none small text-danger"
                                    href="#">Réinitialiser</a>
                            </div>
                            <form id="filterForm">
                                <div class="mb-3">
                                    <label class="form-label">Catégorie</label>
                                    <select name="category" class="form-select">
                                        <option value="">Toutes</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ville</label>
                                    <select name="city" class="form-select">
                                        <option value="">Toutes</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city }}">{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Prix minimum</label>
                                    <input type="number" name="min_price" class="form-control" placeholder="Ex: 100000">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Prix maximum</label>
                                    <input type="number" name="max_price" class="form-control" placeholder="Ex: 500000">
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Résultats : ordre 1 en mobile (en bas) -->
                    <div class="col-12 col-lg-9 order-1">
                        <div class="content-page">
                            <div class="row g-4" id="immobilier-data">
                                @include('layoutsite.partials.resultats', ['immobiliers' => $immobiliers])
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>




    {{-- fin  section principale --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#filterForm').on('submit', function(e) {
                e.preventDefault();
                fetchData();
            });

            $('#filterForm select, #filterForm input').on('change', function() {
                fetchData();
            });

            function fetchData() {
                $.ajax({
                    url: "{{ route('location.filter') }}",
                    method: 'POST',
                    data: $('#filterForm').serialize(),
                    beforeSend: function() {
                        $('#immobilier-data').html('<p>Chargement...</p>');
                    },
                    success: function(data) {
                        $('#immobilier-data').html(data);
                    },
                    error: function(xhr) {
                        $('#immobilier-data').html('<p>Erreur lors du chargement.</p>');
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
