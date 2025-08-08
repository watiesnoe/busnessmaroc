
@extends('layoutsite.site')
@section('content')
    <section class="hero-section position-relative bg-cover text-white py-5"
         style="background-image: url('{{ asset('asset/imgs/accueil1.jpg') }}'); background-size: cover; background-position: center; height: 400px;">

        {{-- <div class="overlay position-absolute w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6); top: 0; left: 0;">
        </div> --}}
        <div class="container position-relative z-2">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="display-4 fw-bold mb-4 wow animate__animated animate__fadeInDown">
                        <span class="text-primary">Trouvez</span> votre futur <br class="d-none d-md-block"> logement en
                        quelques clics
                    </h1>
                    <p class="lead text-white mb-5 wow animate__animated animate__fadeInUp"
                        style="text-shadow: 1px 1px 6px rgba(0,0,0,0.6);">
                        Découvrez les meilleures offres de location – maisons, appartements, immeubles
                    </p>

                <!-- Form Card -->
                <div class="bg-white rounded-pill shadow-lg mx-auto px-3 py-2 d-flex flex-column flex-md-row align-items-center justify-content-between gap-2"
                    style="max-width: 850px;">
                    <input type="text" name="keyword" class="form-control border-0 rounded-pill px-4"
                        placeholder="Ville, quartier ou mot-clé..." />

                    <select name="type" class="form-select border-0 bg-light rounded-pill px-4">
                        <option value="">Catégorie</option>
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                        <option value="immeuble">Immeuble</option>
                    </select>

                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                        Rechercher
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- section top a la une --}}
    <section class="section-box mt-5">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="text-center mb-4">
                <h2 class="section-title wow animate__animated animate__fadeInUp">Top annonces à la une</h2>
                <p class="text-muted wow animate__animated animate__fadeInUp">
                    Parcourez nos meilleures offres immobilières en un clic
                </p>
            </div>

            <div class="box-swiper mt-4">
                <div class="swiper-container swiper-group-6 mh-none swiper">
                    <div class="swiper-wrapper pb-5 pt-3">
                        @foreach ($annoncesVedette as $annonce)
                            <div class="swiper-slide">
                                <a href="{{ route('immobiliers.show', $annonce->id) }}" class="text-decoration-none">
                                    <div class="card-grid-5 card-category position-relative rounded-3 shadow-sm overflow-hidden"
                                        style="background-image: url('{{ asset('storage/' . $annonce->photoPrincipale->url) }}'); background-size: cover; background-position: center; height: 280px;">

                                        <div class="box-cover-img position-relative h-100">
                                            <div class="content-bottom">
                                                <h6 class="mb-1 text-white">{{ $annonce->titre }}</h6>
                                                <p class="font-xs mb-0">
                                                    {{ number_format($annonce->prix, 0, ',', ' ') }} MAD
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Flèches de navigation -->
                <div class="swiper-button-next swiper-button-next-1"></div>
                <div class="swiper-button-prev swiper-button-prev-1"></div>
            </div>
        </div>
    </section>
    {{-- fin de section top annonces à la une --}}
    {{-- section maison a loue --}}
    <section class="section-box mt-30">
        <div class="container">
            <div class="text-center mb-3">
                <h2 class="section-title fw-bold mb-1 wow animate__animated animate__fadeInUp text-primary"
                    style="font-size: 2.2rem; ">
                    Maisons à louer au Maroc
                </h2>
                <p class="lead text-muted wow animate__animated animate__fadeInUp text-nowrap"
                    style="max-width: 600px; margin: auto; overflow: hidden; text-overflow: ellipsis;">
                    Découvrez nos meilleures offres de location — maisons, appartements et immeubles sélectionnés pour vous.
                </p>

            </div>

            <div class="mt-50">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
                        <div class="row">
                            @foreach ($immobiliers as $immobilier)
                                @if (strtolower($immobilier->category->nom) !== 'chambre')
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid-2 grid-bd-16 hover-up">
                                            <div class="card-grid-2-image">
                                                <span class="lbl-hot bg-green">
                                                    <span>{{ $immobilier->category->nom }}</span>
                                                </span>

                                                <div class="image-box">
                                                    <a href="{{ route('immobilier.detail', $immobilier->id) }}">
                                                        <figure>
                                                           @if ($immobilier->photoPrincipale)
                                                                <img src="{{ asset('storage/' . $immobilier->photoPrincipale->url) }}"  height="250" style="object-fit: cover; width: 100%;"
                                                    alt="Photo chambre" alt="Photo principale" class="img-fluid rounded">
                                                            @else
                                                                <img src="{{ asset('admin/media/photos/bg_minecraft.png') }}"   height="250" style="object-fit: cover; width: 100%;"
                                                    alt="Photo chambre" alt="Aucune image" class="img-fluid rounded">
                                                            @endif
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card-block-info">
                                                <h5>
                                                    <a href="{{ route('immobilier.detail', $immobilier->id) }}">
                                                        {{ $immobilier->titre }}
                                                    </a>
                                                </h5>

                                                <div class="mt-3">
                                                    <span class="card-location mr-15">
                                                        {{ $immobilier->ville . ' / ' . $immobilier->quartier }}
                                                    </span>
                                                </div>

                                                <div
                                                    class="card-2-bottom mt-3 d-flex justify-content-between align-items-center">
                                                    <div>
                                                        @if ($immobilier->chambres->isEmpty())
                                                            <span class="text-danger">Aucune chambre</span>
                                                        @endif
                                                    </div>
                                                    <div class="text-end">
                                                        <span
                                                            class="card-text-price fw-bold">{{ $immobilier->prix }}</span>
                                                        <span class="text-muted">/Mois</span>
                                                    </div>
                                                </div>

                                                <p class="font-sm color-text-paragraph mt-3">
                                                    {{ $immobilier->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- fin section maison a loue --}}
    {{-- Section Location par Chambre --}}
    <section class="py-5 bg-light">
        <div class="container">
            <!-- En-tête section -->
            <div class="text-center mb-5">
                <h1 class="fw-bold text-primary display-5">Location par Chambre</h1>
                <p class="text-muted fs-5">
                    Découvrez nos offres de chambres à louer — confortables, pratiques et bien situées.
                </p>
            </div>

            <!-- Grille des cartes -->
            <div class="row">
                @forelse ($immobiliers as $immobi)
                    @if (strtolower($immobi->category->nom) === 'chambre')
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="card-grid-2 grid-bd-16 hover-up">
                                <!-- En-tête avec badge + image -->
                                <div class="card-grid-2-image">


                                    <div class="image-box">
                                        <a href="{{ route('reservation.chambre', $immobi->id) }}">
                                            <figure>
                                                <img src="{{ asset(($immobi->photos->first()->url ?? 'images/default.jpg')) }}"
                                                    height="250" style="object-fit: cover; width: 100%;"
                                                    alt="Photo chambre">
                                            </figure>
                                        </a>
                                    </div>
                                </div>

                                <!-- Contenu principal -->
                                <div class="card-block-info">
                                    <h5>
                                        <a href="{{ route('reservation.chambre', $immobi->id) }}">{{ $immobi->titre }}</a>
                                    </h5>
                                    <div class="mt-2 mb-3">
                                        <span class="card-location me-2">
                                            {{ $immobi->ville }}/{{ $immobi->quartier }}
                                        </span>

                                    </div>

                                    <!-- Prix -->
                                    <div class="card-2-bottom mt-3">
                                        <div class="row">
                                            <div class="col text-end">
                                                <span class="card-text-price text-primary fw-bold">
                                                    {{ number_format($immobi->prix, 0, ',', ' ') }} FCFA
                                                </span>
                                                <span class="text-muted">/mois</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Description (optionnelle) -->
                                    <p class="font-sm color-text-paragraph mt-3">
                                        {{ Str::limit($immobi->description, 100) }}
                                    </p>

                                    <!-- Bouton réserver -->
                                    <div class="mt-3 text-end">
                                        <a href="{{ route('reservation.chambre', $immobi->id) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill">
                                            Réserver
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Aucune chambre disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
    {{-- fin Section Location par Chambre --}}
    {{-- Section actualite --}}
    <section class="section-box mt-50 mb-50">
        <div class="container">
            <!-- Titre + description -->
            <div class="text-center mb-4">
                <h2 class="section-title fw-bold wow animate__animated animate__fadeInUp text-primary">
                    Actualités & Conseils
                </h2>
                <p class="font-lg text-muted wow animate__animated animate__fadeInUp"
                    style="max-width: 600px; margin: 0 auto;">
                    Retrouvez les dernières nouveautés, conseils pratiques et astuces pour bien louer votre logement.
                </p>
            </div>


            <!-- Cartes articles -->
            <div class="row gy-4">
                <!-- Exemple de carte article -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 hover-up"
                        style="transition: transform 0.3s; height: 450px; display: flex; flex-direction: column;">
                        <img src="assets/imgs/news/news1.jpg" class="card-img-top" alt="Conseil pour location"
                            style="height: 180px; object-fit: cover;">
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <div>
                                <span class="badge bg-primary mb-2">Conseils</span>
                                <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">Comment
                                        préparer son logement pour la location ?</a></h5>
                                <p class="card-text text-muted small"
                                    style="max-height: 90px; overflow: hidden; flex-grow: 1;">
                                    Découvrez nos astuces pour rendre votre maison ou chambre attractive et trouver
                                    rapidement un locataire fiable.
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="assets/imgs/users/author1.jpg" alt="Auteur" class="rounded-circle me-2"
                                        width="40" height="40">
                                    <div>
                                        <div class="small fw-semibold">Aminata Diallo</div>
                                        <div class="small text-muted">15 juillet 2025</div>
                                    </div>
                                </div>
                                <small class="text-muted">5 min de lecture</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Copier ce bloc et changer contenu pour chaque article -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 hover-up"
                        style="transition: transform 0.3s; height: 450px; display: flex; flex-direction: column;">
                        <img src="assets/imgs/news/news2.jpg" class="card-img-top" alt="Tendances du marché"
                            style="height: 180px; object-fit: cover;">
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <div>
                                <span class="badge bg-success mb-2">Marché</span>
                                <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">Les
                                        tendances de la location immobilière en 2025</a></h5>
                                <p class="card-text text-muted small"
                                    style="max-height: 90px; overflow: hidden; flex-grow: 1;">
                                    Analyse du marché immobilier actuel et conseils pour choisir la meilleure offre de
                                    location selon votre budget.
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="assets/imgs/users/author2.jpg" alt="Auteur" class="rounded-circle me-2"
                                        width="40" height="40">
                                    <div>
                                        <div class="small fw-semibold">Mamadou Coulibaly</div>
                                        <div class="small text-muted">10 juillet 2025</div>
                                    </div>
                                </div>
                                <small class="text-muted">7 min de lecture</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 hover-up"
                        style="transition: transform 0.3s; height: 450px; display: flex; flex-direction: column;">
                        <img src="assets/imgs/news/news3.jpg" class="card-img-top" alt="Guide location"
                            style="height: 180px; object-fit: cover;">
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <div>
                                <span class="badge bg-warning text-dark mb-2">Guide</span>
                                <h5 class="card-title"><a href="#" class="text-dark text-decoration-none">Les
                                        pièges à éviter lors d’une location</a></h5>
                                <p class="card-text text-muted small"
                                    style="max-height: 90px; overflow: hidden; flex-grow: 1;">
                                    Apprenez à identifier les arnaques et à sécuriser votre contrat de location pour un
                                    séjour en toute sérénité.
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="assets/imgs/users/author3.jpg" alt="Auteur" class="rounded-circle me-2"
                                        width="40" height="40">
                                    <div>
                                        <div class="small fw-semibold">Fatoumata Traoré</div>
                                        <div class="small text-muted">5 juillet 2025</div>
                                    </div>
                                </div>
                                <small class="text-muted">6 min de lecture</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton voir plus -->
            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-lg px-5 shadow-sm hover-up">Voir plus d’articles</a>
            </div>
        </div>
    </section>
    {{-- fin Section actualite  --}}
@endsection
{{-- ancien --}}
