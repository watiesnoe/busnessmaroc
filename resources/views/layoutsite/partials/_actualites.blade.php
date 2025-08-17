<div class="container py-5">
    <h2 class="mb-4 fw-bold">📰 Actualités</h2>
    <div class="row g-4">
        @foreach($actualites as $actu)
            <div class="col-md-3">
                <div class="p-4 bg-white shadow-sm rounded h-100">
                    @if($actu->image)
                        <img src="{{ asset('storage/' . $actu->image) }}" class="img-fluid mb-3 rounded" alt="{{ $actu->titre }}">
                    @endif
                    <h5>{{ $actu->titre }}</h5>
                    <p>{{ Str::limit($actu->contenu, 150) }}</p>
                    <p><small class="text-muted">Publié le {{ \Carbon\Carbon::parse($actu->date_publication)->format('d M Y') }}</small></p>
                    <a href="#" class="btn btn-primary btn-sm">Lire plus</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $actualites->links() }}
    </div>
</div>
