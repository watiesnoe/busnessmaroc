@extends('layoutsite.site')

@section('titre', 'Poulets de Chair — Élevage & Livraison')

@push('styles')
<style>
    :root {
        --poulet-orange: #f2994a;
        --poulet-orange-dark: #d37e2b;
        --poulet-orange-light: #fbeedb;
        --poulet-navy: #0d1b2a;
        --poulet-bg: #fafbfc;
        --poulet-green: #27ae60;
        --poulet-card-shadow: 0 10px 30px rgba(13, 27, 42, 0.05);
        --poulet-hover-shadow: 0 20px 45px rgba(242, 153, 74, 0.15);
    }

    body {
        background-color: var(--poulet-bg);
    }

    /* ===== HERO ===== */
    .poulet-hero {
        background: linear-gradient(135deg, rgba(13, 27, 42, 0.45) 0%, rgba(26, 46, 68, 0.5) 100%), url('{{ asset("asset/imgs/poulet_hero.png") }}') center/cover no-repeat;
        min-height: 480px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        border-bottom: 5px solid var(--poulet-orange);
    }
    .poulet-hero::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 60px;
        background: linear-gradient(to top, var(--poulet-bg), transparent);
        pointer-events: none;
    }
    .poulet-hero .hero-content {
        position: relative;
        z-index: 2;
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

    /* ===== HOW IT WORKS ===== */
    .section-badge {
        display: inline-block;
        background: var(--poulet-orange-light);
        color: var(--poulet-orange-dark);
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 0.35rem 1rem;
        border-radius: 50px;
        letter-spacing: 1px;
    }
    .section-title {
        font-weight: 800;
        color: var(--poulet-navy);
        font-size: 2.2rem;
    }
    .step-card {
        background: #fff;
        border: 1px solid #f0f0f0;
        border-radius: 20px;
        padding: 2.5rem 1.8rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .step-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 4px;
        background: linear-gradient(90deg, var(--poulet-orange), var(--poulet-orange-dark));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .step-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(13, 27, 42, 0.08);
        border-color: transparent;
    }
    .step-card:hover::before {
        opacity: 1;
    }
    .step-icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: var(--poulet-orange-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.8rem;
        color: var(--poulet-orange-dark);
        transition: all 0.3s ease;
    }
    .step-card:hover .step-icon-wrapper {
        background: var(--poulet-orange);
        color: #fff;
        transform: scale(1.1);
    }

    /* ===== PRODUCT CARDS ===== */
    .product-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #f0f0f0;
        box-shadow: var(--poulet-card-shadow);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        overflow: hidden;
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--poulet-hover-shadow);
        border-color: var(--poulet-orange-light);
    }
    .product-img-wrapper {
        height: 250px;
        overflow: hidden;
        position: relative;
    }
    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .product-card:hover .product-img-wrapper img {
        transform: scale(1.08);
    }
    .badge-float {
        position: absolute;
        top: 15px; left: 15px;
        z-index: 3;
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        padding: 0.4rem 0.85rem;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .list-benefits li {
        margin-bottom: 0.6rem;
        font-size: 0.9rem;
        color: #555;
        display: flex;
        align-items: center;
    }
    .list-benefits i {
        font-size: 1.1rem;
        margin-right: 8px;
    }

    /* ===== QTY SELECTOR ===== */
    .qty-counter {
        display: inline-flex;
        align-items: center;
        background: #f1f3f5;
        padding: 4px;
        border-radius: 50px;
        border: 1px solid #e9ecef;
    }
    .qty-counter button {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: none;
        background: #fff;
        color: var(--poulet-navy);
        font-weight: 800;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: all 0.2s ease;
    }
    .qty-counter button:hover:not(:disabled) {
        background: var(--poulet-orange);
        color: #fff;
        transform: scale(1.05);
    }
    .qty-counter input {
        width: 48px;
        text-align: center;
        border: none;
        background: transparent;
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--poulet-navy);
        pointer-events: none;
    }

    /* ===== STICKY SUMMARY ===== */
    .summary-card {
        background: var(--poulet-navy);
        color: #fff;
        border-radius: 24px;
        padding: 2.2rem;
        box-shadow: 0 15px 35px rgba(13, 27, 42, 0.2);
        border: 1px solid rgba(255,255,255,0.08);
    }
    .summary-title {
        font-weight: 700;
        font-size: 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        padding-bottom: 1rem;
        margin-bottom: 1.2rem;
    }
    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
        opacity: 0.85;
    }
    .summary-grand-total {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--poulet-orange);
        margin: 1.2rem 0;
        line-height: 1;
        letter-spacing: -0.5px;
    }

    /* ===== FORM DESIGN ===== */
    .form-card {
        background: #fff;
        border-radius: 24px;
        padding: 2.2rem;
        box-shadow: var(--poulet-card-shadow);
        border: 1px solid #f0f0f0;
    }
    .form-group-custom {
        position: relative;
        margin-bottom: 1.25rem;
    }
    .form-icon-addon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        font-size: 1.1rem;
        pointer-events: none;
    }
    .form-control-custom {
        padding-left: 45px;
        height: 52px;
        border-radius: 12px;
        border: 1.5px solid #e9ecef;
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--poulet-navy);
        transition: all 0.2s ease;
    }
    .form-control-custom:focus {
        border-color: var(--poulet-orange);
        box-shadow: 0 0 0 4px rgba(242, 153, 74, 0.15);
    }
    textarea.form-control-custom {
        height: auto;
        padding-top: 12px;
    }
    .btn-submit-premium {
        background: linear-gradient(135deg, var(--poulet-orange) 0%, var(--poulet-orange-dark) 100%);
        border: none;
        color: #fff;
        height: 55px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1.05rem;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(242, 153, 74, 0.3);
    }
    .btn-submit-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(242, 153, 74, 0.45);
        color: #fff;
    }
    .btn-submit-premium:active {
        transform: translateY(0);
    }

    /* ===== WHY US CARD ===== */
    .benefit-icon-box {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: #fdf2e9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
    }
</style>
@endpush

@section('content')

{{-- ===== HERO ===== --}}
<section class="poulet-hero">
    <div class="container hero-content py-5 text-center text-lg-start">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="glass-badge mb-3 d-inline-block">🐔 ÉLEVAGE DE QUALITÉ SUPÉRIEURE</span>
                <h1 class="display-3 fw-extrabold text-white mb-3" style="line-height: 1.15; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.65);">
                    Poulets de Chair <span class="text-brand-red" style="color: var(--poulet-orange) !important;">Frais</span><br>
                    &amp; Viandes Savoureuses
                </h1>
                <p class="lead text-white-50 mb-4" style="max-width: 600px; font-size: 1.15rem; text-shadow: 0 1px 6px rgba(0,0,0,0.65);">
                    Bénéficiez du service exclusif de notre élevage local. Nous livrons des poulets de chair vifs ou cuisinés avec amour directement chez vous.
                </p>
                <a href="#commander" class="btn btn-brand btn-lg px-4 py-3 fw-bold shadow-lg" style="background: var(--poulet-orange); border-radius: 50px;">
                    <i class="bi bi-bag-plus me-2"></i> Commander en Ligne
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== HOW IT WORKS ===== --}}
<section class="py-5 bg-white">
    <div class="container text-center">
        <span class="section-badge mb-2">Processus Simplifié</span>
        <h2 class="section-title mb-5">Comment réserver ?</h2>
        <div class="row g-4">
            @foreach([
                ['🛒', 'Choix des Produits', 'Sélectionnez la quantité de poulets vifs ou cuisinés que vous désirez.'],
                ['📍', 'Coordonnées', 'Saisissez vos informations de contact et votre adresse exacte de livraison.'],
                ['📞', 'Confirmation', 'Nous prenons contact par téléphone pour valider l\'heure de livraison.'],
                ['🚚', 'Régal à domicile', 'Le propriétaire vous livre à la date voulue. Règlement sur place.']
            ] as $index => $step)
            <div class="col-sm-6 col-lg-3">
                <div class="step-card h-100">
                    <div class="step-icon-wrapper">{{ $step[0] }}</div>
                    <h5 class="fw-bold text-navy mb-2">{{ $step[1] }}</h5>
                    <p class="text-muted small mb-0">{{ $step[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== MAIN ORDER FORM & PRODUCTS ===== --}}
<section id="commander" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge mb-2">Notre Catalogue</span>
            <h2 class="section-title">Faites votre choix</h2>
            <p class="text-muted">Élevage sain en plein air, sans hormones, directement du producteur.</p>
        </div>

        <form id="commandeForm">
            @csrf
            <div class="row g-4 align-items-start">
                
                {{-- === PRODUCTS COLUMN === --}}
                <div class="col-lg-7">
                    
                    {{-- PRODUCT 1: LIVE CHICKEN --}}
                    <div class="product-card mb-4">
                        <div class="row g-0">
                            <div class="col-md-5 product-img-wrapper">
                                <span class="badge-float bg-primary text-white">🐔 Vif &amp; Sain</span>
                                <img src="{{ asset('asset/imgs/poulet_vif.png') }}" alt="Poulet de chair vif">
                            </div>
                            <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="fw-bold text-navy mb-2">Poulet de chair vif</h4>
                                    <p class="text-muted small mb-3">
                                        Poulets vigoureux élevés au grain naturel. Poids idéal entre 2 kg et 2,5 kg.
                                    </p>
                                    <ul class="list-unstyled list-benefits">
                                        <li><i class="bi bi-check2-circle text-success"></i> Élevage local 100% responsable</li>
                                        <li><i class="bi bi-check2-circle text-success"></i> Poids garanti &amp; contrôle qualité</li>
                                        <li><i class="bi bi-check2-circle text-success"></i> Préparé sur demande (sur option)</li>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                                    <div>
                                        <span class="d-block text-muted small">Tarif</span>
                                        <span class="fw-bold text-navy fs-3">3 000 <span class="small" style="font-size: 0.95rem;">FCFA</span></span>
                                    </div>
                                    <div>
                                        <div class="qty-counter">
                                            <button type="button" onclick="changeQty('poulet_chair_qty', -1)">−</button>
                                            <input type="number" id="poulet_chair_qty" name="poulet_chair_qty" value="0" min="0" max="99" readonly>
                                            <button type="button" onclick="changeQty('poulet_chair_qty', 1)">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PRODUCT 2: COOKED CHICKEN --}}
                    <div class="product-card mb-4">
                        <div class="row g-0">
                            <div class="col-md-5 product-img-wrapper">
                                <span class="badge-float bg-success text-white">🔥 Cuit &amp; Assaisonné</span>
                                <img src="{{ asset('asset/imgs/poulet_cuit.png') }}" alt="Viande cuite" style="object-position: right;">
                            </div>
                            <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="fw-bold text-navy mb-2">Viande cuite de poulet</h4>
                                    <p class="text-muted small mb-3">
                                        Notre délicieux poulet de chair rôti entier à la broche et mariné avec notre recette maison.
                                    </p>
                                    <ul class="list-unstyled list-benefits">
                                        <li><i class="bi bi-check2-circle text-success"></i> Épices traditionnelles aromatiques</li>
                                        <li><i class="bi bi-check2-circle text-success"></i> Cuit juste avant le départ</li>
                                        <li><i class="bi bi-check2-circle text-success"></i> Emballage thermique isolant</li>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-3 border-top">
                                    <div>
                                        <span class="d-block text-muted small">Tarif</span>
                                        <span class="fw-bold text-navy fs-3">4 000 <span class="small" style="font-size: 0.95rem;">FCFA</span></span>
                                    </div>
                                    <div>
                                        <div class="qty-counter">
                                            <button type="button" onclick="changeQty('poulet_cuit_qty', -1)">−</button>
                                            <input type="number" id="poulet_cuit_qty" name="poulet_cuit_qty" value="0" min="0" max="99" readonly>
                                            <button type="button" onclick="changeQty('poulet_cuit_qty', 1)">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- === SUMMARY & INFO COLUMN === --}}
                <div class="col-lg-5">
                    
                    {{-- LIVE SUMMARY --}}
                    <div class="summary-card mb-4">
                        <div class="summary-title">
                            <i class="bi bi-cart-check me-2 text-warning"></i> Résumé de la commande
                        </div>
                        <div class="summary-row">
                            <span>Poulet de chair vif × <strong id="sum-chair-qty">0</strong></span>
                            <span id="sum-chair-total">0 FCFA</span>
                        </div>
                        <div class="summary-row">
                            <span>Viande cuite de poulet × <strong id="sum-cuit-qty">0</strong></span>
                            <span id="sum-cuit-total">0 FCFA</span>
                        </div>
                        <hr class="my-3 rgba-white-20">
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <span class="d-block text-white-50 small text-uppercase">Total estimé</span>
                                <div class="summary-grand-total mb-0" id="sum-grand-total">0 FCFA</div>
                            </div>
                            <span class="badge bg-warning text-dark py-2 px-3 fw-bold rounded-pill">Livraison Gratuite</span>
                        </div>
                    </div>

                    {{-- CUSTOMER DETAILS FORM --}}
                    <div class="form-card">
                        <h5 class="fw-bold text-navy mb-4">
                            <i class="bi bi-truck me-2 text-warning"></i> Informations de livraison
                        </h5>

                        <div class="form-group-custom">
                            <i class="bi bi-person form-icon-addon"></i>
                            <input type="text" name="nom_client" id="nom_client" class="form-control form-control-custom" placeholder="Nom complet *" required>
                        </div>

                        <div class="form-group-custom">
                            <i class="bi bi-telephone form-icon-addon"></i>
                            <input type="tel" name="telephone_client" id="telephone_client" class="form-control form-control-custom" placeholder="Téléphone *" required>
                        </div>

                        <div class="form-group-custom">
                            <i class="bi bi-envelope form-icon-addon"></i>
                            <input type="email" name="email_client" id="email_client" class="form-control form-control-custom" placeholder="Adresse e-mail (facultative)">
                        </div>

                        <div class="form-group-custom">
                            <i class="bi bi-geo-alt form-icon-addon"></i>
                            <input type="text" name="adresse_livraison" id="adresse_livraison" class="form-control form-control-custom" placeholder="Adresse précise de livraison *" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <div class="form-group-custom m-0">
                                    <i class="bi bi-building form-icon-addon"></i>
                                    <input type="text" name="ville_livraison" id="ville_livraison" class="form-control form-control-custom" value="Casablanca" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <select name="creneau_livraison" id="creneau_livraison" class="form-select form-control-custom" style="padding-left: 15px;">
                                    <option value="">Créneau indifférent</option>
                                    <option value="matin">Matin (8h - 12h)</option>
                                    <option value="midi">Midi (12h - 15h)</option>
                                    <option value="soir">Soir (15h - 19h)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group-custom">
                            <i class="bi bi-calendar-event form-icon-addon"></i>
                            <input type="date" name="date_livraison_souhaitee" id="date_livraison_souhaitee" class="form-control form-control-custom" min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="form-group-custom">
                            <textarea name="notes" id="notes" class="form-control form-control-custom" rows="3" placeholder="Notes (ex: poulet découpé, assaisonnement épicé...)"></textarea>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-submit-premium w-100">
                            <i class="bi bi-check2-all me-2"></i> Valider ma commande
                        </button>
                        
                        <p class="text-center text-muted small mt-3 mb-0">
                            <i class="bi bi-info-circle me-1"></i> Règlement sécurisé en espèces à la livraison.
                        </p>
                    </div>

                </div>

            </div>
        </form>
    </div>
</section>

{{-- ===== ADVANTAGES ===== --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge mb-2">Garantie &amp; Charte</span>
            <h2 class="section-title">Nos Engagements</h2>
        </div>
        <div class="row g-4">
            @foreach([
                ['bi-award', '#e67e22', 'Qualité Premium', 'Des volailles nourries de façon naturelle, saines et suivies quotidiennement.'],
                ['bi-truck', '#2980b9', 'Respect de la chaîne', 'Transport optimisé garantissant la fraîcheur maximale des viandes cuites ou fraîches.'],
                ['bi-currency-exchange', '#27ae60', 'Prix direct ferme', 'Pas de distributeurs ni d\'intermédiaires. Le tarif le plus juste.'],
                ['bi-emoji-smile', '#8e44ad', 'Service Clientèle', 'Le propriétaire valide personnellement le créneau horaire avec vous.']
            ] as $advantage)
            <div class="col-md-6 col-lg-3">
                <div class="p-4 rounded-4 bg-light border-0 h-100 text-center text-md-start">
                    <div class="benefit-icon-box text-center" style="color: {{ $advantage[1] }}; background: {{ $advantage[1] }}15; margin: 0 auto 1rem;">
                        <i class="bi {{ $advantage[0] }}"></i>
                    </div>
                    <h5 class="fw-bold text-navy">{{ $advantage[2] }}</h5>
                    <p class="text-muted small mb-0">{{ $advantage[3] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== SUCCESS MODAL ===== --}}
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="modal-body text-center p-5" style="background: linear-gradient(180deg, #fdfaf6, #ffffff);">
                <div class="display-1 text-warning mb-3">🎉</div>
                <h3 class="fw-bold text-navy mb-2">Merci pour votre confiance !</h3>
                <p class="text-muted mb-4" id="modal-message"></p>
                
                <div class="card bg-light border-0 p-3 mb-4 rounded-3 text-start">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">N° Référence :</span>
                        <strong id="modal-uuid" class="text-dark small"></strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Total à régler :</span>
                        <strong id="modal-total" style="color: var(--poulet-orange);"></strong>
                    </div>
                </div>

                <button class="btn btn-brand px-5 py-2.5 fw-bold" style="background: var(--poulet-orange); border-radius: 50px;" data-bs-dismiss="modal">
                    Fermer la fenêtre
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
const PRIX_CHAIR = 3000;
const PRIX_CUIT  = 4000;

function fmt(n){ return n.toLocaleString('fr-FR') + ' FCFA'; }

function changeQty(id, delta){
    const el = document.getElementById(id);
    let val = parseInt(el.value) + delta;
    if(val < 0) val = 0;
    if(val > 99) val = 99;
    el.value = val;
    updateSummary();
}

function updateSummary(){
    const chair = parseInt(document.getElementById('poulet_chair_qty').value) || 0;
    const cuit  = parseInt(document.getElementById('poulet_cuit_qty').value)  || 0;
    const tChair = chair * PRIX_CHAIR;
    const tCuit  = cuit  * PRIX_CUIT;
    const total  = tChair + tCuit;

    document.getElementById('sum-chair-qty').textContent   = chair;
    document.getElementById('sum-cuit-qty').textContent    = cuit;
    document.getElementById('sum-chair-total').textContent = fmt(tChair);
    document.getElementById('sum-cuit-total').textContent  = fmt(tCuit);
    document.getElementById('sum-grand-total').textContent = fmt(total);
}

$(document).ready(function(){
    updateSummary();

    $('#commandeForm').on('submit', function(e){
        e.preventDefault();

        const chair = parseInt($('#poulet_chair_qty').val()) || 0;
        const cuit  = parseInt($('#poulet_cuit_qty').val())  || 0;

        if(chair === 0 && cuit === 0){
            Swal.fire({ 
                icon: 'warning', 
                title: 'Aucun produit choisi',
                text: 'Veuillez renseigner au moins 1 poulet (vif ou cuit) dans votre commande.', 
                confirmButtonColor: '#f2994a' 
            });
            return;
        }

        const $btn = $('#submitBtn');
        $btn.html('<span class="spinner-border spinner-border-sm me-2"></span>Enregistrement...').prop('disabled', true);

        $.ajax({
            url: "{{ route('poulets.store') }}",
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $(this).serialize(),
            success: function(res){
                $('#modal-message').text(res.message);
                $('#modal-uuid').text(res.commande.uuid.substring(0, 8) + '...');
                $('#modal-total').text(res.commande.montant_total);
                new bootstrap.Modal(document.getElementById('successModal')).show();

                $('#commandeForm')[0].reset();
                $('#poulet_chair_qty, #poulet_cuit_qty').val(0);
                updateSummary();
            },
            error: function(xhr){
                const msg = xhr.responseJSON?.message || 'Une erreur est survenue lors de l\'enregistrement.';
                Swal.fire({ 
                    icon: 'error', 
                    title: 'Désolé', 
                    text: msg, 
                    confirmButtonColor: '#f2994a' 
                });
            },
            complete: function(){
                $btn.html('<i class="bi bi-check2-all me-2"></i> Valider ma commande').prop('disabled', false);
            }
        });
    });
});
</script>

<script src="{{ asset('temp_assets/sweetalert2.all.min.js') }}"></script>
@endsection
