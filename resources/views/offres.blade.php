@extends('layoutsite.site')

@section('titre', 'Offres d\'Emploi — Business Maroc')

@push('styles')
<style>
    :root {
        --job-primary: #d50100;
        --job-navy: #0d1b2a;
        --job-bg: #f8f9fa;
    }

    .job-hero {
        background: linear-gradient(135deg, rgba(13, 27, 42, 0.45) 0%, rgba(26, 46, 68, 0.5) 100%), url('{{ asset("asset/imgs/offre2.png") }}') center/cover no-repeat;
        height: 360px;
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 4px solid var(--job-primary);
    }
    .job-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 60px;
        background: linear-gradient(to top, var(--job-bg), transparent);
        pointer-events: none;
    }

    .glass-badge {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: #fff;
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.4rem 1rem;
        border-radius: 30px;
        letter-spacing: 1px;
    }

    /* Filters sidebar styling */
    .filter-card {
        background: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 20px;
        padding: 1.8rem;
        box-shadow: 0 10px 30px rgba(13, 27, 42, 0.04);
        position: sticky;
        top: 100px;
    }
    .filter-title {
        font-weight: 800;
        color: var(--job-navy);
        font-size: 1.1rem;
        border-bottom: 1.5px solid #f0f0f0;
        padding-bottom: 0.8rem;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .filter-list li {
        margin-bottom: 0.75rem;
    }
    .filter-checkbox-label {
        font-size: 0.92rem;
        color: #495057;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        user-select: none;
    }
    .filter-checkbox-input {
        cursor: pointer;
        width: 18px;
        height: 18px;
        border-radius: 6px !important;
        border: 1.5px solid #ced4da;
        margin-right: 10px;
        transition: all 0.2s;
    }
    .filter-checkbox-input:checked {
        background-color: var(--job-primary);
        border-color: var(--job-primary);
        box-shadow: 0 0 0 3px rgba(213, 1, 0, 0.15);
    }

    .fadeInUp {
        animation: fadeInUp 0.5s ease forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@section('content')
{{-- Hero section --}}
<section class="job-hero">
    <div class="container position-relative z-2 text-center text-lg-start py-5">
        <div class="row">
            <div class="col-lg-8">
                <span class="glass-badge mb-3 d-inline-block">💼 CARRIÈRE &amp; OPPORTUNITÉS</span>
                <h1 class="display-4 fw-extrabold text-white mb-3" style="line-height: 1.15; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.65);">
                    Découvrez Nos Meilleures <span style="color: var(--job-primary);">Offres d'Emploi</span>
                </h1>
                <p class="lead text-white-50 mb-0" style="max-width: 600px; font-size: 1.15rem; text-shadow: 0 1px 6px rgba(0,0,0,0.65);">
                    Parcourez toutes les opportunités disponibles et trouvez le poste ou le stage qui vous correspond le mieux.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Main section --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            
            {{-- Filters Column --}}
            <div class="col-lg-3 col-md-4 col-12 fadeInUp">
                <div class="filter-card">
                    <h5 class="filter-title">
                        <i class="bi bi-funnel-fill text-danger"></i> Secteurs d'activité
                    </h5>
                    <ul class="list-unstyled filter-list mb-0">
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
                                <label class="filter-checkbox-label">
                                    <input class="form-check-input filter-checkbox-input secteur-checkbox" type="checkbox" value="{{ $secteur }}">
                                    <span>{{ $secteur }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Offers Listing Column --}}
            <div class="col-lg-9 col-md-8 col-12 fadeInUp">
                <div class="row g-4" id="offres-list">
                    @include('layoutsite.partials.liste')
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function chargerOffres(page = 1) {
        let secteurs = [];
        $('.secteur-checkbox:checked').each(function() {
            secteurs.push($(this).val());
        });

        $.ajax({
            url: "{{ route('offres.filtrer') }}",
            method: "GET",
            data: {
                secteurs: secteurs,
                page: page
            },
            success: function(response) {
                $('#offres-list').html(response);
            },
            error: function(xhr) {
                console.error("Erreur de chargement :", xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        // Filtrage par checkbox
        $('.secteur-checkbox').on('change', function() {
            chargerOffres(1); // recharger depuis la page 1
        });

        // Pagination AJAX
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            chargerOffres(page);
        });
    });
</script>
@endsection
