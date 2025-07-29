{{--@extends('layoutsite.site')--}}
{{--@section('content')--}}
{{--      <section class="section-box mt-30">--}}
{{--        <div class="container">--}}
{{--          <div class="row flex-row-reverse">--}}
{{--            <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">--}}
{{--              <div class="content-page">--}}
{{--                <div class="box-filters-job">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing <strong>41-60 </strong>of <strong>944 </strong>jobs</span></div>--}}
{{--                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">--}}
{{--                      <div class="display-flex2">--}}
{{--                        <div class="box-border mr-10"><span class="text-sortby">Show:</span>--}}
{{--                          <div class="dropdown dropdown-sort">--}}
{{--                            <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">--}}
{{--                              <li><a class="dropdown-item active" href="#">10</a></li>--}}
{{--                              <li><a class="dropdown-item" href="#">12</a></li>--}}
{{--                              <li><a class="dropdown-item" href="#">20</a></li>--}}
{{--                            </ul>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                        <div class="box-border"><span class="text-sortby">Sort by:</span>--}}
{{--                          <div class="dropdown dropdown-sort">--}}
{{--                            <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>Newest Post</span><i class="fi-rr-angle-small-down"></i></button>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">--}}
{{--                              <li><a class="dropdown-item active" href="#">Newest Post</a></li>--}}
{{--                              <li><a class="dropdown-item" href="#">Oldest Post</a></li>--}}
{{--                              <li><a class="dropdown-item" href="#">Rating Post</a></li>--}}
{{--                            </ul>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                        <div class="box-view-type"><a class="view-type" href="jobs-list.html"><img src="assets/imgs/template/icons/icon-list.svg" alt="jobBox"></a><a class="view-type" href="jobs-grid.html"><img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="results" id="immobilier-data">--}}
{{--                    @include('layoutsite.partials.resultats', ['immobiliers' => $immobiliers])--}}
{{--                </div>--}}
{{--              </div>--}}

{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-12 col-sm-12 col-12">--}}
{{--              <div class="sidebar-shadow none-shadow mb-30">--}}
{{--                <div class="sidebar-filters">--}}
{{--                  <div class="filter-block head-border mb-30">--}}
{{--                    <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>--}}
{{--                  </div>--}}
{{--                   <form id="filterForm">--}}
{{--                        <h4>Filtres</h4>--}}

{{--                        <label>Catégorie</label>--}}
{{--                        <select name="category" class="form-control mb-2">--}}
{{--                            <option value="">Toutes</option>--}}
{{--                            @foreach($categories as $cat)--}}
{{--                                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}

{{--                        <label>Ville</label>--}}
{{--                        <select name="city"  class="form-control mb-2">--}}
{{--                            <option value="">Toutes</option>--}}
{{--                            @foreach($cities as $city)--}}
{{--                                <option value="{{ $city }}">{{ $city }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}

{{--                        <label>Prix min</label>--}}
{{--                        <input type="number" name="min_price" class="form-control mb-2">--}}

{{--                        <label>Prix max</label>--}}
{{--                        <input type="number" name="max_price" class="form-control mb-2">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </section>--}}

{{--@endsection--}}
{{--@section('scripts')--}}
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--    $.ajaxSetup({--}}
{{--        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }--}}
{{--    });--}}

{{--    $('#filterForm').on('submit', function (e) {--}}
{{--        e.preventDefault();--}}
{{--        fetchData();--}}
{{--    });--}}

{{--    $('#filterForm select, #filterForm input').on('change', function () {--}}
{{--        fetchData();--}}
{{--    });--}}

{{--    function fetchData() {--}}
{{--        $.ajax({--}}
{{--            url: "{{ route('location.filter') }}",--}}
{{--            method: 'POST',--}}
{{--            data: $('#filterForm').serialize(),--}}
{{--            beforeSend: function () {--}}
{{--                $('#immobilier-data').html('<p>Chargement...</p>');--}}
{{--            },--}}
{{--            success: function (data) {--}}
{{--                $('#immobilier-data').html(data);--}}
{{--            },--}}
{{--            error: function (xhr) {--}}
{{--                $('#immobilier-data').html('<p>Erreur lors du chargement.</p>');--}}
{{--                console.log(xhr.responseText);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--});--}}
{{--</script>--}}
{{--@endsection--}}
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
    }
</style>
@extends('layoutsite.site')
@section('content')
    <!-- SECTION HERO AVEC HAUTEUR AJUSTÉE -->
    <section class="section-box-2 position-relative bg-location">
        <div class="container">
            <!-- Contenu centré avec padding -->
            <div class="block-banner d-flex flex-column justify-content-center align-items-center text-center position-relative" style="height: 100%; padding: 0 15px; z-index: 2; color: #eee; text-shadow: 0 2px 8px rgba(0,0,0,0.8); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

                <h3 class="wow animate__animated animate__fadeInUp" style="font-weight: 800; font-size: 2.8rem; margin-bottom: 0.6rem; color: #f5f5f5;">
                    <span class="color-brand-2" style="color: #5a9cff;">22 Logements</span> disponibles aujourd’hui
                </h3>
                <div class="font-sm wow animate__animated animate__fadeInUp" data-wow-delay=".1s" style="font-size: 1.6rem; max-width: 750px; line-height: 1.8; color: #ddd;">
                    Trouvez rapidement votre futur chez-vous,<br class="d-none d-xl-block">
                    entre appartements, maisons et studios adaptés à vos besoins.
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="section-box wow animate__animated animate__fadeIn">
            <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
                <!-- Ligne centrée avec largeur réduite (ex: 95%) -->
                <div class="row flex-row-reverse mx-auto" style="max-width: 95%;">
                    <!-- Colonne principale élargie à 9 sur 12 (75%) -->
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="content-page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5">
                                  <span class="text-small text-showing">
                                    Affichage de <strong>41-60</strong> sur <strong>944</strong> logements
                                  </span>
                                    </div>
                                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                        <div class="display-flex2 d-flex justify-content-lg-end align-items-center flex-wrap">
                                            <div class="box-border">
                                                <span class="text-sortby">Afficher :</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                                        <span>12</span><i class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">10</a></li>
                                                        <li><a class="dropdown-item active" href="#">12</a></li>
                                                        <li><a class="dropdown-item" href="#">20</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-border">
                                                <span class="text-sortby">Trier par :</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                                        <span>Plus récent</span><i class="fi-rr-angle-small-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item active" href="#">Plus récent</a></li>
                                                        <li><a class="dropdown-item" href="#">Plus ancien</a></li>
                                                        <li><a class="dropdown-item" href="#">Par popularité</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-view-type">
                                                <a class="view-type" href="jobs-list.html">
                                                    <img src="assets/imgs/template/icons/icon-list.svg" alt="Liste">
                                                </a>
                                                <a class="view-type" href="jobs-grid.html">
                                                    <img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="Grille">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="results row" id="immobilier-data">
                                @include('layoutsite.partials.resultats', ['immobiliers' => $immobiliers])
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-filters">
                            <div class="filter-block head-border mb-30">
                                <h5>Filtres avancés <a class="link-reset" href="#">Réinitialiser</a></h5>
                            </div>
                            <form id="filterForm">
                                <h4>Filtres</h4>
                                <label>Catégorie</label>
                                <select name="category" class="form-control mb-2">
                                    <option value="">Toutes</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                    @endforeach
                                </select>
                                <label>Ville</label>
                                <select name="city" class="form-control mb-2">
                                    <option value="">Toutes</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                                <label>Prix minimum</label>
                                <input type="number" name="min_price" class="form-control mb-2" placeholder="Ex: 100000">
                                <label>Prix maximum</label>
                                <input type="number" name="max_price" class="form-control mb-2" placeholder="Ex: 500000">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
<!-- https://uideck.com/business-templates -->
