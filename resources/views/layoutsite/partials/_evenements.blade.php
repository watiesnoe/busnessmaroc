<!-- Événements -->
<div class="container py-5">
    <h2 class="mb-4 fw-bold">🎉 Prochains événements</h2>
    <div class="row g-4">
        @foreach($evenements as $event)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->titre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->titre }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date_debut)->format('d M Y H:i') }}</p>
                        <p><strong>Lieu :</strong> {{ $event->lieu }}</p>
                        <p><strong>Prix :</strong> {{ number_format($event->prix_ticket, 0, ',', ' ') }} FCFA</p>
                        <button class="btn btn-reserver w-100"
                                onclick="reserverTicket('{{ $event->id }}', '{{ $event->titre }}', {{ $event->prix_ticket }})">
                            Réserver un ticket
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $evenements->links() }}
    </div>
</div>
