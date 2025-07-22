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
                                        <h6 class="fw-bold mb-3 col-6">{{ $offre->titre }}</h6>

                                        <div class="mb-2">
                                            <span class="badge bg-secondary me-1">{{ $offre->type_offre }}</span>
                                            <span class="badge bg-secondary me-1">{{ $offre->secteur }}</span>
                                        </div>

                                        <p class="mb-2 text-muted"><i class="bi bi-geo-alt-fill"></i> {{ $offre->lieu }}</p>
                                        <p class="mb-3 col-6"><strong>Niveau :</strong> {{ $offre->niveau }}</p>

                                        <p class="mb-2"><strong>Date de publication :</strong> {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}</p>
                                        <p class="mb-2"><strong>Date limite :</strong> {{ \Carbon\Carbon::parse($offre->date_limite)->format('d/m/Y') }}</p>

                                        <p class="mb-3 col-6"><strong>Salaire :</strong> {{ $offre->salaire }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card h-100 shadow-sm rounded border-0" style="min-height: 420px;">
                                    <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                        <h5 class="mb-0 text-white">Entreprise</h5>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="fw-bold mb-2">{{ $offre->entreprise }}</h6>

                                        <p><strong>Secteur :</strong> {{ $offre->secteur }}</p>

                                        <hr>

                                        <p class="text-muted flex-grow-1" style="font-size: 0.95rem;">
                                            <!-- Description de l'entreprise si tu en as un champ dédié -->
                                            <!-- Sinon tu peux réutiliser la description de l'offre ou autre -->
                                            {{ $offre->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="card rounded shadow-sm border-0" style="box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                <div class="card-header bg-primary text-white text-center rounded-top py-3">
                                    <h5 class="mb-0 text-white">Détail du poste</h5>
                                </div>
                                <div class="card-body"
                                     style="background-color: #fefefe; color: #222; font-size: 1rem; line-height: 1.5;">
                                    <h6 class="fw-bold mb-3 col-6">Poste proposé : {{ $offre->titre }}</h6>

                                    <p>{!! nl2br(e($offre->description)) !!}</p>

                                    <h6 class="fw-semibold mt-4">Profil recherché :</h6>
                                    <ul>
                                        @foreach(explode(';', $offre->profil_recherche) as $critere)
                                            <li>{{ trim($critere) }}</li>
                                        @endforeach
                                    </ul>

                                    <p><strong>Date limite de candidature :</strong> {{ \Carbon\Carbon::parse($offre->date_limite)->format('d/m/Y') }}</p>
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
                                    <h6 class="fw-bold mb-3 col-6">Commercial, vente</h6>

                                    <div class="mb-2">
                                        <span class="badge bg-secondary me-1">Marketing, communication</span>
                                        <span class="badge bg-secondary me-1">Métiers des services</span>
                                    </div>

                                    <p class="mb-2 text-muted"><i class="bi bi-geo-alt-fill"></i> Bamako - Koulikoro</p>
                                    <p class="mb-3 col-6"><strong>Type de travail : </strong>Hybride</p>

                                    <p class="mb-2"><strong>Expérience :</strong></p>
                                    <ul class="list-inline mb-3 col-6">
                                        <li class="list-inline-item badge bg-light text-dark">Étudiant, jeune diplômé
                                        </li>
                                        <li class="list-inline-item badge bg-light text-dark">Débutant &lt; 2 ans</li>
                                        <li class="list-inline-item badge bg-light text-dark">2 à 5 ans</li>
                                        <li class="list-inline-item badge bg-light text-dark">5 à 10 ans</li>
                                        <li class="list-inline-item badge bg-light text-dark">+10 ans</li>
                                    </ul>

                                    <p class="mb-3 col-6"><strong>Qualification :</strong> Avant bac</p>

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
                                    <form action="/soumettre-candidature" method="POST" enctype="multipart/form-data" novalidate>
                                            @csrf
                                            <div class="row">
                                            <!-- Civilité -->
                                            <div class="mb-3 col-6">
                                                <label for="civilite" class="form-label fw-semibold">Civilité <span class="text-danger">*</span></label>
                                                <select id="civilite" name="civilite" class="form-select" required>
                                                    <option value="">-- Sélectionnez --</option>
                                                    <option value="M.">M.</option>
                                                    <option value="Mme">Mme</option>
                                                    <option value="Mlle">Mlle</option>
                                                </select>
                                                <div class="invalid-feedback">Le champ Civilité est obligatoire.</div>
                                            </div>

                                            <!-- Prénom -->
                                            <div class="mb-3 col-6">
                                                <label for="prenom" class="form-label fw-semibold">Prénom <span class="text-danger">*</span></label>
                                                <input type="text" id="prenom" name="prenom" class="form-control" required>
                                                <div class="invalid-feedback">Le champ Prénom est obligatoire.</div>
                                            </div>

                                            <!-- Nom -->
                                            <div class="mb-3 col-6">
                                                <label for="nom" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
                                                <input type="text" id="nom" name="nom" class="form-control" required>
                                                <div class="invalid-feedback">Le champ Nom est obligatoire.</div>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-3 col-6">
                                                <label for="email" class="form-label fw-semibold">Votre email <span class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" class="form-control" required>
                                                <div class="invalid-feedback">Le champ Votre email est obligatoire.</div>
                                            </div>

                                            <!-- Tel -->
                                            <div class="mb-3 col-6">
                                                <label for="telephone" class="form-label fw-semibold">Tel (ex: 65 01 23 45) <span class="text-danger">*</span></label>
                                                <input type="tel" id="telephone" name="telephone" class="form-control" pattern="[0-9\s]{8,15}" required>
                                                <div class="invalid-feedback">Le champ Tel est obligatoire et doit être valide.</div>
                                            </div>

                                            <!-- CV -->
                                            <div class="mb-3 col-6">
                                                <label for="cv" class="form-label fw-semibold">Votre CV <span class="text-danger">*</span></label>
                                                <input type="file" id="cv" name="cv" class="form-control" accept=".pdf,.doc,.docx" required>
                                                <small class="form-text text-muted">Extensions autorisées : doc, docx, pdf.</small>
                                                <div class="invalid-feedback">Le CV est requis ! vous devez attacher un CV au format (doc, docx ou pdf)</div>
                                            </div>

                                            <!-- Personnaliser message -->
                                            <div class="form-check form-switch mb-3 col-6">
                                                <input class="form-check-input" type="checkbox" id="personnaliserMessage" onchange="toggleMessage()">
                                                <label class="form-check-label" for="personnaliserMessage">Personnaliser mon message au recruteur</label>
                                            </div>

                                            <div class="mb-3 col-6" id="messageContainer" style="display:none;">
                                                <label for="message" class="form-label fw-semibold">Message au recruteur</label>
                                                <textarea id="message" name="message" class="form-control" rows="5" maxlength="5000" placeholder="Votre message..."></textarea>
                                                <small class="form-text text-muted">Limite de 5000 caractères.</small>
                                            </div>

                                            <div class="mb-3 col-6 form-text">
                                                En cliquant sur le bouton « Suivant », vous acceptez les <a href="/conditions-generales" target="_blank">Conditions Générales d'Utilisation</a>.
                                            </div>

                                            <button type="submit" class="btn btn-primary rounded-pill px-4">Suivant</button>
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


            <script>
                // Afficher ou cacher la zone de message personnalisée
                function toggleMessage() {
                    const checkbox = document.getElementById('personnaliserMessage');
                    const container = document.getElementById('messageContainer');
                    container.style.display = checkbox.checked ? 'block' : 'none';
                }

                // Validation Bootstrap 5
                (() => {
                    'use strict'
                    const forms = document.querySelectorAll('form')

                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
                })()
            </script>

        </main>
    @endsection
