@extends('layoutsite.site')

@section('titre')
    Actualités & Événements
@endsection

@section('content')
    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            background: #212529;
        }

        .navbar-brand {
            color: #fff;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .card img {
            height: 220px;
            object-fit: cover;
        }

        .btn-reserver {
            background: #e63946;
            color: white;
            border-radius: 25px;
        }

        .btn-reserver:hover {
            background: #c1121f;
        }

        /*footer { background: #212529; color: #ccc; padding: 20px; margin-top: 50px; }*/
    </style>

    <!-- Hero -->
    {{--    <section class="text-center py-5 bg-dark text-white">--}}
    {{--        <div class="container">--}}
    {{--            <h1 class="fw-bold">Ne manquez aucun événement !</h1>--}}
    {{--            <p class="lead">Découvrez les dernières actualités, concerts, festivals et spectacles près de chez vous.</p>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Carrousel des événements -->
    <!-- Carrousel des images des événements -->
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <h1 class="fw-bold text-center mb-4">Ne manquez aucun événement !</h1>

            <div id="evenementsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($evenements as $key => $event)
                        <div class="carousel-item @if($key==0) active @endif">
                            <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top"
                                 alt="{{ $event->titre }}">
                        </div>
                    @endforeach
                </div>

                <!-- Contrôles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#evenementsCarousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#evenementsCarousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>

                <!-- Indicateurs -->
                <div class="carousel-indicators mt-3">
                    @foreach($evenements as $key => $event)
                        <button type="button" data-bs-target="#evenementsCarousel" data-bs-slide-to="{{ $key }}"
                                class="@if($key==0) active @endif" aria-current="true"
                                aria-label="Slide {{ $key+1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div id="evenements-container">
        @include('layoutsite.partials._evenements', ['evenements' => $evenements])
    </div>

    <!-- Actualités -->
    <div id="actualites-container">
        @include('layoutsite.partials._actualites', ['actualites' => $actualites])
    </div>
    <!-- Événements -->
    {{--    <div class="container py-5">--}}
    {{--        <h2 class="mb-4 fw-bold">🎉 Prochains événements</h2>--}}
    {{--        <div class="row g-4">--}}
    {{--            @foreach($evenements as $event)--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="card shadow-sm h-100">--}}
    {{--                        <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->titre }}">--}}
    {{--                        <div class="card-body">--}}
    {{--                            <h5 class="card-title">{{ $event->titre }}</h5>--}}
    {{--                            <p class="card-text">{{ Str::limit($event->description, 100) }}</p>--}}
    {{--                            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date_debut)->format('d M Y H:i') }}</p>--}}
    {{--                            <p><strong>Lieu :</strong> {{ $event->lieu }}</p>--}}
    {{--                            <p><strong>Prix :</strong> {{ number_format($event->prix_ticket, 0, ',', ' ') }} FCFA</p>--}}
    {{--                            <button class="btn btn-reserver w-100"--}}
    {{--                                    onclick="reserverTicket('{{ $event->id }}', '{{ $event->titre }}', {{ $event->prix_ticket }})">--}}
    {{--                                Réserver un ticket--}}
    {{--                            </button>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}

    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <!-- Actualités -->--}}
    {{--    <div class="container py-5">--}}
    {{--        <h2 class="mb-4 fw-bold">📰 Actualités</h2>--}}
    {{--        <div class="row g-4">--}}
    {{--            @foreach($actualites as $actu)--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <div class="p-4 bg-white shadow-sm rounded h-100">--}}
    {{--                        @if($actu->image)--}}
    {{--                            <img src="{{ asset('images/'.$actu->image) }}" class="img-fluid mb-3 rounded" alt="{{ $actu->titre }}">--}}
    {{--                        @endif--}}
    {{--                        <h5>{{ $actu->titre }}</h5>--}}
    {{--                        <p>{{ Str::limit($actu->contenu, 150) }}</p>--}}
    {{--                        <p><small class="text-muted">Publié le {{ \Carbon\Carbon::parse($actu->date_publication)->format('d M Y') }}</small></p>--}}
    {{--                        <a href="#" class="btn btn-primary btn-sm">Lire plus</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Modal réservation -->
    <div class="modal fade" id="reservationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Réservation de ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formReservation" method="POST" action="{{ route('tickets.store') }}">
                        @csrf
                        <input type="hidden" id="eventId" name="evenement_id">

                        <div class="mb-3">
                            <label class="form-label">Événement</label>
                            <input type="text" id="eventName" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantité de tickets</label>
                            <input type="number" class="form-control" id="quantite" name="quantite" min="1" value="1"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant total</label>
                            <input type="text" class="form-control" id="montantTotal" readonly>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Confirmer la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            // Ouvrir modal avec infos de l'événement
            window.reserverTicket = function (eventId, eventName, prixTicket) {
                $('#eventId').val(eventId);
                $('#eventName').val(eventName);
                $('#quantite').val(1);
                $('#montantTotal').val(prixTicket.toLocaleString() + ' FCFA');

                $('#quantite').off('input').on('input', function () {
                    let quantite = parseInt($(this).val()) || 1;
                    $('#montantTotal').val((quantite * prixTicket).toLocaleString() + ' FCFA');
                });

                $('#reservationModal').modal('show');
            };

            // Soumission du formulaire via AJAX
            $('#formReservation').submit(function (e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        alert('✅ Votre ticket a été réservé avec succès !');
                        $('#reservationModal').modal('hide');
                        form[0].reset();
                    },
                    error: function (xhr) {
                        alert('❌ Une erreur est survenue. Veuillez réessayer.');
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function () {

            // Pagination événements
            $(document).on('click', '#evenements-container .pagination a', function (e) {
                e.preventDefault();
                let url = $(this).attr('href');
                $.get(url, {section: 'evenements'}, function (data) {
                    $('#evenements-container').html(data);
                    window.scrollTo(0, 0);
                });
            });

            // Pagination actualités
            $(document).on('click', '#actualites-container .pagination a', function (e) {
                e.preventDefault();
                let url = $(this).attr('href');
                $.get(url, {section: 'actualites'}, function (data) {
                    $('#actualites-container').html(data);
                    window.scrollTo(0, 0);
                });
            });

        });
    </script>

@endsection
