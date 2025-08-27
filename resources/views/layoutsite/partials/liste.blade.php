{{-- <div class="row g-4">
    @forelse($offres as $offre)
     <div class="accordion mb-3" id="accordionOffres">
    <div class="accordion-item border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- En-tête -->
        <h2 class="accordion-header" id="heading{{ $offre->id }}">
            <button 
                class="accordion-button collapsed fw-bold d-flex flex-column align-items-start text-start"
                style="background: linear-gradient(135deg, #ffffff, #ffe5e5); color:#d50100;"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse{{ $offre->id }}"
                aria-expanded="false"
                aria-controls="collapse{{ $offre->id }}">
                
                <!-- Titre + Entreprise + Salaire -->
                <span class="fs-5">{{ $offre->titre }}</span>
                <small class="text-muted mt-1">
                    <i class="bi bi-building me-2"></i>{{ $offre->entreprise }} 
                    | <span style="color:#d50100;">💰 {{ $offre->salaire ?? 'Non précisé' }}</span>
                </small>
            </button>
        </h2>

        <!-- Contenu -->
        <div id="collapse{{ $offre->id }}" 
             class="accordion-collapse collapse"
             aria-labelledby="heading{{ $offre->id }}"
             data-bs-parent="#accordionOffres">
             
            <div class="accordion-body" style="background:#fff; color:#333;">
                <h6 class="fw-bold text-danger mb-2">Description</h6>
                <p class="text-dark">
                    {{ strip_tags($offre->description) }}
                </p>

                <h6 class="fw-bold text-danger mt-3 mb-2">Profil recherché</h6>
                <ul class="list-unstyled small text-dark mb-3">
                    <li class="mb-2">
                        <i class="bi bi-mortarboard-fill me-2" style="color:#d50100;"></i>
                        <strong>Niveau :</strong> {{ $offre->niveau }}
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-person-workspace me-2" style="color:#d50100;"></i>
                        <strong>Expérience :</strong> Étudiant, jeune diplômé et plus
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-file-earmark-text me-2" style="color:#d50100;"></i>
                        <strong>Contrat :</strong> {{ ucfirst($offre->type_offre) }}
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-stars me-2" style="color:#d50100;"></i>
                        <strong>Compétences :</strong>
                        <div class="d-flex flex-wrap mt-1">
                            @foreach (explode(',', $offre->profil_recherche) as $competence)
                                <span class="badge mb-2 me-2 px-3 py-2"
                                    style="background:#fff; color:#d50100; border:1px solid #ff9999; border-radius:12px; font-size:0.85rem;">
                                    {{ trim($competence) }}
                                </span>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <h6 class="fw-bold text-danger mt-3 mb-2">Informations</h6>
                <ul class="list-unstyled small text-dark mb-3">
                    <li>
                        <i class="bi bi-geo-alt-fill me-2" style="color:#d50100;"></i>
                        <strong>Région :</strong> {{ $offre->lieu }}
                    </li>
                    <li>
                        <i class="bi bi-calendar-date me-2" style="color:#d50100;"></i>
                        <strong>Publiée le :</strong>
                        {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}
                    </li>
                </ul>

                <div class="text-end">
                    <a href="{{ route('details_offre.show', $offre->id) }}" 
                       class="btn px-4 py-2"
                       style="background: linear-gradient(135deg, #d50100, #ff4d4d); color:white; font-weight:600; border-radius: 8px;"
                       onmouseover="this.style.background='linear-gradient(135deg, #b30000, #e60000)'"
                       onmouseout="this.style.background='linear-gradient(135deg, #d50100, #ff4d4d)'">
                        Plus de détails
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    @empty
        <div class="col-12">
            <div class="alert alert-warning">Aucune offre disponible pour le moment.</div>
        </div>
    @endforelse --}}

    {{-- Pagination --}}
    {{-- <div class="col-12 mt-4">
        {!! $offres->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div> --}}

<div class="row g-4">
    @forelse($offres as $offre)
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                <!-- En-tête -->
                <div class="card-header text-white fw-bold" 
                     style="background: linear-gradient(135deg, #d50100, #ff4d4d);">
                    <span class="fs-5">{{ $offre->titre }}</span>
                    <div class="small mt-1">
                        <i class="bi bi-building me-2"></i>{{ $offre->entreprise }} 
                        | <span class="fw-bold">💰 {{ $offre->salaire ?? 'Non précisé' }}</span>
                    </div>
                </div>

                <!-- Corps de la card -->
                <div class="card-body text-dark d-flex flex-column">
                    <h6 class="fw-bold text-danger mb-2">Description</h6>
                    <p class="small flex-grow-1">
                        {{ Str::limit(strip_tags($offre->description), 100, '...') }}
                    </p>

                    <h6 class="fw-bold text-danger mt-3 mb-2">Profil recherché</h6>
                    <ul class="list-unstyled small mb-3">
                        <li>
                            <i class="bi bi-mortarboard-fill me-2 text-danger"></i>
                            <strong>Niveau :</strong> {{ $offre->niveau }}
                        </li>
                        <li>
                            <i class="bi bi-person-workspace me-2 text-danger"></i>
                            <strong>Expérience :</strong> Étudiant, jeune diplômé et plus
                        </li>
                        <li>
                            <i class="bi bi-file-earmark-text me-2 text-danger"></i>
                            <strong>Contrat :</strong> {{ ucfirst($offre->type_offre) }}
                        </li>
                        <li>
                            <i class="bi bi-stars me-2 text-danger"></i>
                            <strong>Compétences :</strong>
                            <div class="d-flex flex-wrap mt-1">
                                @foreach (explode(',', $offre->profil_recherche) as $competence)
                                    <span class=" mb-2 me-2 px-3 py-2"
                                        style="background:#fff; color:#d50100; border:1px solid #ff9999; border-radius:12px; font-size:0.85rem;">
                                        {{ trim($competence) }}
                                    </span>
                                @endforeach
                            </div>
                        </li>
                    </ul>

                    <h6 class="fw-bold text-danger mt-3 mb-2">Informations</h6>
                    <ul class="list-unstyled small mb-3">
                        <li>
                            <i class="bi bi-geo-alt-fill me-2 text-danger"></i>
                            <strong>Région :</strong> {{ $offre->lieu }}
                        </li>
                        <li>
                            <i class="bi bi-calendar-date me-2 text-danger"></i>
                            <strong>Publiée le :</strong>
                            {{ \Carbon\Carbon::parse($offre->date_publication)->format('d/m/Y') }}
                        </li>
                    </ul>

                    <div class="mt-auto text-end">
                        <a href="{{ route('details_offre.show', $offre->id) }}" 
                           class="btn px-4 py-2"
                           style="background: linear-gradient(135deg, #d50100, #ff4d4d); color:white; font-weight:600; border-radius: 8px;"
                           onmouseover="this.style.background='linear-gradient(135deg, #b30000, #e60000)'"
                           onmouseout="this.style.background='linear-gradient(135deg, #d50100, #ff4d4d)'">
                            Plus de détails
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                Aucune offre disponible pour le moment.
            </div>
        </div>
    @endforelse

    <!-- Pagination -->
    <div class="col-12 mt-4">
        {!! $offres->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>



