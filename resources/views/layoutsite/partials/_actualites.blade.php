<!-- Actualités -->
<div class="container py-5">
    <!-- Titre -->
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #d50100;">📰 Actualités</h2>
        <p class="text-muted">Restez informé des dernières nouvelles et mises à jour.</p>
    </div>

    <!-- Liste des actualités -->
    <div class="row g-4">
        @foreach($actualites as $actu)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 rounded-3 overflow-hidden actu-card h-100">
                    <!-- Image -->
                    @if($actu->image)
                        <img src="{{ asset('storage/' . $actu->image) }}"
                             class="card-img-top"
                             alt="{{ $actu->titre }}"
                             style="height: 180px; object-fit: cover;">
                    @endif

                    <!-- Contenu -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold" style="color: #d50100;">{{ $actu->titre }}</h5>
                        <p class="text-muted small mb-2">
                            {{ Str::limit($actu->contenu, 100) }}
                        </p>
                        <p class="mb-3">
                            <small class="text-muted">
                                📅 Publié le {{ \Carbon\Carbon::parse($actu->date_publication)->format('d M Y') }}
                            </small>
                        </p>
                        <a href="#"
                           class="btn mt-auto text-white"
                           style="background-color: #d50100; border-color: #d50100;">
                            Lire plus
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $actualites->links() }}
    </div>
</div>

<!-- Styles -->
<style>
    .actu-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .actu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>
