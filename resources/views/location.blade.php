<style>
    .bg-location {
        height: 400px;
        background-image: url('../asset/imgs/location.avif');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

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

    .text-showing {
        font-size: 1rem;
        color: #555;
    }

    .box-border {
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-right: 10px;
        display: flex;
        align-items: center;
        background-color: #fff;
    }

    .text-sortby {
        font-size: 0.9rem;
        margin-right: 5px;
        color: #666;
    }

    .btn.dropdown-toggle {
        background-color: transparent;
        border: none;
        font-weight: 500;
        color: #333;
    }

    .view-type img {
        width: 22px;
        margin-left: 8px;
    }

    .sidebar-filters {
        background-color: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .sidebar-filters h4 {
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: #333;
    }

    .sidebar-filters label {
        font-weight: 500;
        margin-top: 15px;
        margin-bottom: 5px;
        display: block;
        color: #444;
    }

    .sidebar-filters .form-control {
        font-size: 0.95rem;
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .filter-block h5 {
        font-size: 1rem;
        margin-bottom: 20px;
        color: #444;
    }

    .filter-block .link-reset {
        float: right;
        font-size: 0.9rem;
        color: #999;
        text-decoration: underline;
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
    <section class="text-white d-flex align-items-center"
        style="background-image: url('{{ asset('asset/imgs/location.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container text-center">
            <div class="container text-center">
                <h3 class="fw-bold mb-3" style="font-size: 2.8rem; color: #f5f5f5;">
                    <span class="" style="color: #d50100;">Trouvez</span> le logement idéal <br class="d-none d-md-block"> pour vous dès
                    aujourd’hui
                </h3>
                <p class="lead mx-auto" style="max-width: 750px; color: #f0f0f0; text-shadow: 1px 1px 4px rgba(0,0,0,0.8);">
                    Explorez une large sélection d’appartements, maisons et studios, soigneusement choisis pour répondre à
                    toutes vos envies.
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

