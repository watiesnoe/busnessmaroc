{{-- <!-- Événements -->
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
</div> --}}



<!-- Événements -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #d50100;">🎉 Prochains événements</h2>
        <p class="text-muted">Découvrez nos événements à venir et réservez votre place dès maintenant.</p>
    </div>

    <div class="row g-4">
        @foreach($evenements as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100 border-0 rounded-3 overflow-hidden event-card">
                    <!-- Image -->
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $event->image) }}"
                             class="card-img-top"
                             alt="{{ $event->titre }}"
                             style="height: 220px; object-fit: cover;">
                        <span class="badge position-absolute top-0 end-0 m-2 px-3 py-2 shadow-sm"
                              style="background-color: #d50100;">
                            {{ \Carbon\Carbon::parse($event->date_debut)->format('d M') }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2" style="color: #d50100;">{{ $event->titre }}</h5>
                        <p class="text-muted small mb-3">
                            {{ Str::limit($event->description, 100) }}
                        </p>

                        <ul class="list-unstyled mb-4">
                            <li><i class="bi bi-geo-alt" style="color: #d50100;"></i> <strong>Lieu :</strong> {{ $event->lieu }}</li>
                            <li><i class="bi bi-cash-coin" style="color: #d50100;"></i> <strong>Prix :</strong> {{ number_format($event->prix_ticket, 0, ',', ' ') }} FCFA</li>
                            <li><i class="bi bi-calendar-event" style="color: #d50100;"></i> <strong>Début :</strong> {{ \Carbon\Carbon::parse($event->date_debut)->format('d M Y H:i') }}</li>
                        </ul>

                        <button class="btn w-100 mt-auto text-white"
                                style="background-color: #d50100; border-color: #d50100;"
                                onclick="reserverTicket('{{ $event->id }}', '{{ $event->titre }}', {{ $event->prix_ticket }})">
                            Réserver un ticket
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $evenements->links() }}
    </div>
</div>

<!-- Styles personnalisés -->
<style>
    .event-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>

