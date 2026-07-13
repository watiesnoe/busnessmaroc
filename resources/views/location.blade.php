@extends('layoutsite.site')

@section('titre', 'Tous les logements disponibles')

@section('content')

{{-- Hero --}}
<section class="position-relative d-flex align-items-center text-white"
    style="min-height:340px; background-image:url('{{ asset('asset/imgs/location.png') }}'); background-size:cover; background-position:center;">
    <div class="hero-overlay position-absolute w-100 h-100" style="top:0;left:0;"></div>
    <div class="container position-relative z-2 py-5 text-center">
        <span class="section-badge bg-white bg-opacity-10 border border-white border-opacity-25 text-white mb-3 d-inline-block" style="letter-spacing:2px;">Location</span>
        <h1 class="display-5 fw-bold text-white mb-2" style="text-shadow:0 2px 16px rgba(0,0,0,0.5);">
            Trouvez le logement <span style="color:#f87171;">idéal</span> pour vous
        </h1>
        <p class="lead opacity-90 mb-0">Explorez notre catalogue complet de biens disponibles au Maroc</p>
    </div>
</section>

{{-- Main content --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            {{-- ===== SIDEBAR FILTERS ===== --}}
            <div class="col-lg-3">
                <div class="bg-white rounded-3 shadow-sm p-4 sticky-top" style="top:90px;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-bold mb-0 text-navy"><i class="bi bi-funnel me-2" style="color:var(--brand-red)"></i>Filtres</h6>
                        <a href="{{ route('location') }}" class="text-muted small text-decoration-none hover-red">Réinitialiser</a>
                    </div>
                    <form id="filterForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase" style="letter-spacing:.5px;">Catégorie</label>
                            <select name="category" class="form-select form-select-sm">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase" style="letter-spacing:.5px;">Ville</label>
                            <select name="city" class="form-select form-select-sm">
                                <option value="">Toutes les villes</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase" style="letter-spacing:.5px;">Budget (MAD/mois)</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-brand w-100 mt-2">
                            <i class="bi bi-search me-1"></i> Filtrer
                        </button>
                    </form>

                    <hr class="my-4">
                    <div class="text-center">
                        <p class="small text-muted mb-1">Besoin d'aide ?</p>
                        <a href="#" class="btn btn-outline-secondary btn-sm w-100"><i class="bi bi-headset me-1"></i>Contacter le support</a>
                    </div>
                </div>
            </div>

            {{-- ===== RESULTS ===== --}}
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <p class="mb-0 text-muted small">
                        <span class="fw-semibold text-dark" id="result-count">{{ $immobiliers->total() }}</span> bien(s) trouvé(s)
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="text-muted small">Trier :</span>
                        <select class="form-select form-select-sm" style="width:auto;" id="sortSelect">
                            <option>Les plus récents</option>
                            <option>Prix croissant</option>
                            <option>Prix décroissant</option>
                        </select>
                    </div>
                </div>

                <div class="row g-4" id="immobilier-data">
                    @include('layoutsite.partials.resultats', ['immobiliers' => $immobiliers])
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // Auto-filter on change
    $('#filterForm select, #filterForm input').on('change', debounce(fetchData, 400));
    $('#filterForm').on('submit', function(e){ e.preventDefault(); fetchData(); });

    function fetchData(){
        $('#immobilier-data').html('<div class="col-12 text-center py-5"><div class="spinner-border" style="color:var(--brand-red)"></div><p class="text-muted mt-2 small">Chargement...</p></div>');
        $.ajax({
            url: "{{ route('location.filter') }}",
            method: 'POST',
            data: $('#filterForm').serialize(),
            success: function(data){ $('#immobilier-data').html(data); },
            error: function(){ $('#immobilier-data').html('<div class="col-12"><p class="text-danger text-center">Erreur lors du chargement.</p></div>'); }
        });
    }

    function debounce(fn, delay){
        let timer;
        return function(){ clearTimeout(timer); timer = setTimeout(fn, delay); };
    }
});
</script>
@endsection
