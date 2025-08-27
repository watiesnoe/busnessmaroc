@extends('layoutsite.site')

@section('titre')
    Actualités & Événements
@endsection

@section('content')
    {{-- <style>
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
            border-radius: 0;
        }

        .btn-reserver:hover {
            background: #c1121f;
        }

    </style>

 
    <section class="py-5 bg-dark text-white">
        <h4 class="fw-bold text-center ">Ne manquez aucun événement !</h4>
        <div class="container-fluid">

            <div id="evenementsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($evenements as $key => $event)
                        <div class="carousel-item @if ($key == 0) active @endif">
                            <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" height="400"
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
                    @foreach ($evenements as $key => $event)
                        <button type="button" data-bs-target="#evenementsCarousel" data-bs-slide-to="{{ $key }}"
                                class="@if ($key == 0) active @endif" aria-current="true"
                                aria-label="Slide {{ $key+1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}

    <style>
        body {
            background: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            background: #212529;
        }

        .navbar-brand {
            color: #fff;
        }

        /* Section événements */
        .evenements-section {
            position: relative;
            height: 500px;
            /* Ajuste la hauteur comme tu veux */
            overflow: hidden;
        }

        .evenements-section h4 {
            position: absolute;
            z-index: 10;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #d50100;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Carousel images */
        .evenement-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Carousel controls */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            padding: 15px;
        }

        /* Indicators */
        .carousel-indicators {
            bottom: 15px;
        }

        .carousel-indicators button {
            background-color: #ccc;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .carousel-indicators .active {
            background-color: #d50100;
        }
    </style>

    <section class="evenements-section">
        <h4>🎉 Ne manquez aucun événement !</h4>

        <div id="evenementsCarousel" class="carousel slide h-100" data-bs-ride="carousel">
            <!-- Slides -->
            <div class="carousel-inner h-100">
                @foreach ($evenements as $key => $event)
                    <div class="carousel-item @if ($key == 0) active @endif h-100">
                        <img src="{{ asset('storage/' . $event->image) }}" class="evenement-img" alt="{{ $event->titre }}">
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#evenementsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#evenementsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>

            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($evenements as $key => $event)
                    <button type="button" data-bs-target="#evenementsCarousel" data-bs-slide-to="{{ $key }}"
                        class="@if ($key == 0) active @endif" aria-label="Slide {{ $key + 1 }}">
                    </button>
                @endforeach
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

    <!-- Modal réservation -->
    <div class="modal fade" id="reservationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header" style="background-color: #f48181; color: #fff;">
                <h5 class="modal-title">Réservation de ticket</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
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
                            <input type="number" class="form-control" id="quantite" name="quantite" min="1"
                                value="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant total</label>
                            <input type="text" class="form-control" id="montantTotal" readonly>
                        </div>

                        <button type="submit" class="btn btn-success w-100" style="background-color: #d50100; color: #fff;">Confirmer la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="reservationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #d50100; color: #fff;">
                <h5 class="modal-title">Réservation de ticket</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <form id="formReservation" method="POST" action="{{ route('tickets.store') }}">
                    @csrf
                    <input type="hidden" id="eventId" name="evenement_id">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Événement</label>
                        <input type="text" id="eventName" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Quantité de tickets</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" min="1"
                            value="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Montant total</label>
                        <input type="text" class="form-control" id="montantTotal" readonly>
                    </div>

                    <button type="submit" class="btn w-100" style="background-color: #d50100; color: #fff;">
                        Confirmer la réservation
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            // Ouvrir modal avec infos de l'événement
            window.reserverTicket = function(eventId, eventName, prixTicket) {
                $('#eventId').val(eventId);
                $('#eventName').val(eventName);
                $('#quantite').val(1);
                $('#montantTotal').val(prixTicket.toLocaleString() + ' FCFA');

                $('#quantite').off('input').on('input', function() {
                    let quantite = parseInt($(this).val()) || 1;
                    $('#montantTotal').val((quantite * prixTicket).toLocaleString() + ' FCFA');
                });

                $('#reservationModal').modal('show');
            };

            // Soumission du formulaire via AJAX
            $('#formReservation').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        alert('✅ Votre ticket a été réservé avec succès !');
                        $('#reservationModal').modal('hide');
                        form[0].reset();
                    },
                    error: function(xhr) {
                        alert('❌ Une erreur est survenue. Veuillez réessayer.');
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            // Pagination événements
            $(document).on('click', '#evenements-container .pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                $.get(url, {
                    section: 'evenements'
                }, function(data) {
                    $('#evenements-container').html(data);
                    window.scrollTo(0, 0);
                });
            });

            // Pagination actualités
            $(document).on('click', '#actualites-container .pagination a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                $.get(url, {
                    section: 'actualites'
                }, function(data) {
                    $('#actualites-container').html(data);
                    window.scrollTo(0, 0);
                });
            });

        });
    </script>
@endsection
