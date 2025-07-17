    @extends('layoutsite.site')
    @section('content')
        <style>
            .card-body {
                background-color: #fefefe;
                /* Fond très clair pour bien contraster */
                color: #222222;
                /* Texte bien foncé */
                font-size: 1rem;
                /* Taille de police confortable */
                line-height: 1.5;
                /* Meilleure lisibilité */
                padding: 1.5rem !important;
                /* Espace autour du contenu */
            }

            .card-header {
                font-weight: 600;
                font-size: 1.25rem;
            }

            a.text-decoration-none.text-dark:hover {
                color: #0d6efd;
                /* Bootstrap primary blue au hover */
            }

            .badge.bg-light.text-dark {
                font-weight: 500;
            }
        </style>

        <main class="main bg-light-primary">
            <section class="section-box-2">
                <div class="container">
                    <div class="banner-hero banner-single banner-single-bg">
                        <div class="block-banner text-center">
                            <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2">22 Jobs</span>
                                Available Now</h3>
                            <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero
                                repellendus magni, <br class="d-none d-xl-block">atque delectus molestias quis?</div>
                            <div class="text-center my-4">
                                <a href="#postuler" class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm">
                                    Postuler Maintenant
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <section class="section-box mt-30">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card h-100 shadow-sm rounded border-0" style="min-height: 420px;">
                                    <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                        <h5 class="mb-0 text-white">Résumé du poste</h5>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="fw-bold mb-3">Commercial, vente</h6>

                                        <div class="mb-2">
                                            <span class="badge bg-secondary me-1">Marketing, communication</span>
                                            <span class="badge bg-secondary me-1">Métiers des services</span>
                                        </div>

                                        <p class="mb-2 text-muted"><i class="bi bi-geo-alt-fill"></i> Bamako - Koulikoro</p>
                                        <p class="mb-3"><strong>Type de travail : </strong>Hybride</p>

                                        <p class="mb-2"><strong>Expérience :</strong></p>
                                        <ul class="list-inline mb-3">
                                            <li class="list-inline-item badge bg-light text-dark">Étudiant, jeune diplômé
                                            </li>
                                            <li class="list-inline-item badge bg-light text-dark">Débutant &lt; 2 ans</li>
                                            <li class="list-inline-item badge bg-light text-dark">2 à 5 ans</li>
                                            <li class="list-inline-item badge bg-light text-dark">5 à 10 ans</li>
                                            <li class="list-inline-item badge bg-light text-dark">+10 ans</li>
                                        </ul>

                                        <p class="mb-3"><strong>Qualification :</strong> Avant bac</p>

                                        {{-- <div class="mt-auto">
                                            <span class="badge bg-info text-white"> TyCDD</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card h-100 shadow-sm rounded border-0" style="min-height: 420px;">
                                    <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                        <h5 class="mb-0 text-white">Entreprise</h5>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="fw-bold mb-2">TOP BUILDING COMPANY</h6>

                                        <p><strong>Secteur d'activité :</strong></p>
                                        <ul class="list-unstyled mb-3">
                                            <li><span class="badge bg-secondary me-1 mb-1">BTP, construction</span></li>
                                            <li><span class="badge bg-secondary me-1 mb-1">Immobilier, architecture,
                                                    urbanisme</span></li>
                                            <li><span class="badge bg-secondary me-1 mb-1">Services autres</span></li>
                                        </ul>


                                        <hr>

                                        <p class="text-muted flex-grow-1" style="font-size: 0.95rem;">
                                            Top Building Company, leader dans le secteur de la construction et de rénovation
                                            à Bamako, Mali. Top Building Company c'est plusieurs années d'expérience dans le
                                            domaine, un savoir-faire reconnu et une équipe dédiée pour vos projets.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Troisième carte --}}
                        <div class="col-12 mb-4">
                            <div class="card rounded shadow-sm border-0" style="box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                    <h5 class="mb-0 text-white">Détail du poste</h5>
                                </div>
                                <div class="card-body"
                                    style="background-color: #fefefe; color: #222; font-size: 1rem; line-height: 1.5;">
                                    <h6 class="fw-bold mb-3">Poste proposé : Distributeur Ambulant - Kati</h6>

                                    <p>
                                        Pour le lancement promotionnel de notre produit dentaire au Mali, nous recrutons des
                                        Distributeurs Ambulants.
                                        Nous vous rassurons que toutes les candidatures seront traitées avec attention tout
                                        en garantissant la même
                                        chance à tous les candidats sans distinction de sexe ni de religion, avec un salaire
                                        très intéressant.
                                    </p>

                                    <h6 class="fw-semibold mt-4">Profil recherché :</h6>
                                    <ul>
                                        <li>Être jeune et dynamique, habiter Bamako, Kati et ses environs</li>
                                        <li>Être en bonne condition physique</li>
                                        <li>Avoir une bonne moralité</li>
                                        <li>Avoir un bon sens de communication</li>
                                        <li>Une expérience dans la vente et la distribution serait un atout</li>
                                    </ul>

                                    <h6 class="fw-semibold mt-4">Critères de l'annonce :</h6>
                                    <ul>
                                        <li><strong>Métier :</strong> Commercial, vente - Marketing, communication - Métiers
                                            des services</li>
                                        <li><strong>Secteur d'activité :</strong> Distribution, vente, commerce de gros</li>
                                        <li><strong>Type de contrat :</strong> CDD</li>
                                        <li><strong>Région :</strong> Bamako - Koulikoro</li>
                                        <li><strong>Ville :</strong> Kati</li>
                                        <li><strong>Travail à distance :</strong> Hybride</li>
                                        <li><strong>Niveau d'expérience :</strong> Étudiant, jeune diplômé - Débutant &lt; 2
                                            ans - 2 à 5 ans - 5 à 10 ans - &gt; 10 ans</li>
                                        <li><strong>Niveau d'études :</strong> Qualification avant bac</li>
                                        <li><strong>Nombre de postes :</strong> 5</li>
                                        <li><strong>Salaire proposé :</strong> &lt; 150 000 FCFA</li>
                                        <li><strong>Management d'équipe :</strong> Oui</li>
                                    </ul>


                                    <div class="alert alert-warning mt-4" role="alert" style="font-size: 0.9rem;">
                                        <strong>Soyez vigilant !</strong> N'envoyez pas d'argent à un employeur potentiel.
                                        Ne versez aucune somme
                                        d'argent en échange d'un contrat de travail potentiel ou pour suivre une formation
                                        préalable à l'embauche.
                                        Merci de signaler toute irrégularité en utilisant le formulaire de contact candidat
                                        et en sélectionnant
                                        l'objet <em>"Signaler une annonce d'emploi"</em>.
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
           
            <section class="section-box mt-30">
                <div class="container ">
                    <div class="row flex-row-reverse">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-4">
                            <div class="card-grid-2 rounded shadow p-0" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                                <div class="bg-primary text-white rounded-top py-3 text-center">
                                    <h5 class="mb-0 text-white">Résumé du poste</h5>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="fw-bold mb-3">Commercial, vente</h6>

                                    <div class="mb-2">
                                        <span class="badge bg-secondary me-1">Marketing, communication</span>
                                        <span class="badge bg-secondary me-1">Métiers des services</span>
                                    </div>

                                    <p class="mb-2 text-muted"><i class="bi bi-geo-alt-fill"></i> Bamako - Koulikoro</p>
                                    <p class="mb-3"><strong>Type de travail : </strong>Hybride</p>

                                    <p class="mb-2"><strong>Expérience :</strong></p>
                                    <ul class="list-inline mb-3">
                                        <li class="list-inline-item badge bg-light text-dark">Étudiant, jeune diplômé
                                        </li>
                                        <li class="list-inline-item badge bg-light text-dark">Débutant &lt; 2 ans</li>
                                        <li class="list-inline-item badge bg-light text-dark">2 à 5 ans</li>
                                        <li class="list-inline-item badge bg-light text-dark">5 à 10 ans</li>
                                        <li class="list-inline-item badge bg-light text-dark">+10 ans</li>
                                    </ul>

                                    <p class="mb-3"><strong>Qualification :</strong> Avant bac</p>

                                    {{-- <div class="mt-auto">
                                            <span class="badge bg-info text-white"> TyCDD</span>
                                        </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-4 mx-auto" id="postuler">
                            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                                <!-- En-tête -->
                                <div
                                    class="bg-primary text-white py-3 px-4 d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 fw-bold text-white">Postuler</h5>
                                    <small>J'ai déjà un compte
                                        (<a href="{{route('se_connecter')}}" class="text-white text-decoration-underline"
                                            style="color: white;" onmousedown="this.style.color='blue'"
                                            onmouseup="this.style.color='white'">
                                            se connecter
                                        </a>

                                        )
                                    </small>
                                </div>

                                <!-- Contenu -->
                                <div class="card-body bg-light px-4 py-4">
                                    <h5 class="text-dark mb-3">Offre : <a href="job-details.html"
                                            class="text-decoration-none text-primary">Full Stack Engineer</a></h5>

                                    <!-- Formulaire -->
                                    <h6 class="mb-3 text-dark">📝 Formulaire de candidature</h6>

                                    <form action="soumettre-candidature.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="nom" class="form-label fw-semibold">Nom</label>
                                                <input type="text" class="form-control rounded-pill shadow-sm"
                                                    id="nom" name="nom" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="prenom" class="form-label fw-semibold">Prénom</label>
                                                <input type="text" class="form-control rounded-pill shadow-sm"
                                                    id="prenom" name="prenom" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email" class="form-label fw-semibold">Adresse Email</label>
                                                <input type="email" class="form-control rounded-pill shadow-sm"
                                                    id="email" name="email" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="telephone" class="form-label fw-semibold">Téléphone</label>
                                                <input type="text" class="form-control rounded-pill shadow-sm"
                                                    id="telephone" name="telephone">
                                            </div>

                                            <div class="col-12">
                                                <label for="cv" class="form-label fw-semibold">📄 Importer votre
                                                    CV</label>
                                                <input type="file" class="form-control rounded shadow-sm"
                                                    id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                                                <small class="text-muted d-block mt-1">Formats acceptés : .pdf, .doc,
                                                    .docx</small>
                                            </div>
                                            <div class="mb-4">
                                                <label for="message" class="form-label fw-bold">Message au
                                                    recruteur</label>

                                                <div class="form-check form-switch mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="personnaliserMessage" onclick="toggleTextarea()">
                                                    <label class="form-check-label"
                                                        for="personnaliserMessage">Personnaliser mon message au
                                                        recruteur</label>
                                                </div>

                                                <textarea id="message" class="form-control" rows="7" maxlength="5000">
                                                    Bonjour,

                                                    Je vous adresse ma candidature pour le poste de Distributeur Ambulant - Kati qui m'intéresse tout particulièrement.

                                                    Vous trouverez ci-joint mon CV.

                                                    J’aimerais avoir l’opportunité de discuter avec vous en détail de ma candidature.

                                                    Je vous remercie pour votre considération.

                                                    Bien cordialement,
                                                </textarea>

                                                <div class="form-text text-end">
                                                    Limite de 5000 caractères. Il reste : <span
                                                        id="charCount">4689</span>/5000
                                                </div>
                                            </div>

                                        </div>

                                        <div class="d-grid mt-4">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill py-2 shadow-sm">Soumettre ma
                                                candidature</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        {{-- Deuxième carte --}}

                    </div>
                </div>
            </section>
            {{-- Section newsletter inchangée --}}
            <section class="section-box mt-50 mb-20">
                <div class="container">
                    <div class="box-newsletter">
                        <div class="row">
                            <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                                <img src="assets/imgs/template/newsletter-left.png" alt="joxBox">
                            </div>
                            <div class="col-lg-12 col-xl-6 col-12">
                                <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                                <div class="box-form-newsletter mt-40">
                                    <form class="form-newsletter">
                                        <input class="input-newsletter" type="text" value=""
                                            placeholder="Enter your email here">
                                        <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-3 col-12 text-center d-none d-xl-block">
                                <img src="assets/imgs/template/newsletter-right.png" alt="joxBox">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
