@extends('layouts.app')

@section('content')
<div class="content">
    <!-- Quick Stats -->
    <div class="row items-push">
        <div class="col-6 col-md-3 col-lg-3">
            <a class="block block-rounded block-link-pop h-100 mb-0 bg-primary-dark" href="{{ route('immobiliers.index') }}">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between text-white">
                    <div>
                        <div class="fs-2 fw-bold">{{ $totalImmobiliers }}</div>
                        <div class="fs-sm text-uppercase fw-semibold opacity-75">Immobiliers</div>
                    </div>
                    <div class="item item-rounded bg-black-25">
                        <i class="fa fa-building text-white"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <a class="block block-rounded block-link-pop h-100 mb-0 bg-success" href="{{ route('chambres.index') }}">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between text-white">
                    <div>
                        <div class="fs-2 fw-bold">{{ $chambresDisponibles }}</div>
                        <div class="fs-sm text-uppercase fw-semibold opacity-75">Chambres Libres</div>
                    </div>
                    <div class="item item-rounded bg-black-25">
                        <i class="fa fa-bed text-white"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <a class="block block-rounded block-link-pop h-100 mb-0 bg-warning" href="{{ route('contrats.index') }}">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between text-white">
                    <div>
                        <div class="fs-2 fw-bold">{{ $contratsActifs }}</div>
                        <div class="fs-sm text-uppercase fw-semibold opacity-75">Contrats Actifs</div>
                    </div>
                    <div class="item item-rounded bg-black-25">
                        <i class="fa fa-file-contract text-white"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <a class="block block-rounded block-link-pop h-100 mb-0 bg-danger" href="{{ route('offre.index') }}">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between text-white">
                    <div>
                        <div class="fs-2 fw-bold">{{ $totalOffres }}</div>
                        <div class="fs-sm text-uppercase fw-semibold opacity-75">Offres Emploi</div>
                    </div>
                    <div class="item item-rounded bg-black-25">
                        <i class="fa fa-briefcase text-white"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Secondary Stats: Events and Revenue -->
    <div class="row items-push">
        <div class="col-6 col-md-3 col-lg-3">
            <div class="block block-rounded h-100 mb-0 bg-white shadow-sm border-start border-primary border-4">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fs-sm text-uppercase fw-semibold text-muted">Événements</div>
                        <div class="fs-3 fw-bold text-dark mt-1">{{ $totalEvenements }}</div>
                    </div>
                    <div class="item item-rounded bg-primary-light-op">
                        <i class="fa fa-calendar-alt text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <div class="block block-rounded h-100 mb-0 bg-white shadow-sm border-start border-info border-4">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fs-sm text-uppercase fw-semibold text-muted">Tickets Vendus</div>
                        <div class="fs-3 fw-bold text-dark mt-1">{{ $totalTicketsVendus }}</div>
                    </div>
                    <div class="item item-rounded bg-info-light-op">
                        <i class="fa fa-ticket-alt text-info"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <div class="block block-rounded h-100 mb-0 bg-white shadow-sm border-start border-success border-4">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fs-sm text-uppercase fw-semibold text-muted">Revenue Logements</div>
                        <div class="fs-4 fw-bold text-success mt-1">{{ number_format($totalRevenueLogements, 2, ',', ' ') }} MAD</div>
                    </div>
                    <div class="item item-rounded bg-success-light-op">
                        <i class="fa fa-wallet text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <div class="block block-rounded h-100 mb-0 bg-white shadow-sm border-start border-warning border-4">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fs-sm text-uppercase fw-semibold text-muted">Revenue Tickets</div>
                        <div class="fs-4 fw-bold text-warning mt-1">{{ number_format($totalRevenueTickets, 2, ',', ' ') }} MAD</div>
                    </div>
                    <div class="item item-rounded bg-warning-light-op">
                        <i class="fa fa-money-bill-wave text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart & Recent Actions -->
    <div class="row">
        <!-- Monthly Offers Chart -->
        <div class="col-lg-6">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-chart-line text-muted me-2"></i> Publications d'offres par mois
                    </h3>
                </div>
                <div class="block-content block-content-full text-center">
                    <div class="py-3">
                        <canvas id="offersChart" style="height: 300px; max-height: 300px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- App summary -->
        <div class="col-lg-6">
            <div class="block block-rounded h-100">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-info-circle text-muted me-2"></i> Vue d'ensemble du système
                    </h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-borderless table-vcenter">
                        <tbody>
                            <tr>
                                <td>
                                    <span class="fw-semibold text-dark">Immobiliers Disponibles</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-success-op text-success">{{ $immobiliersDisponibles }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold text-dark">Chambres Occupées / Réservées</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-danger-op text-danger">{{ $immobiliersOccupes }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold text-dark">Candidatures Soumises</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-primary-op text-primary">{{ $totalCandidatures }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-semibold text-dark">Clients sans Candidatures</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge bg-warning-op text-warning">{{ $clientsNonCandidats }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Reservations & Tickets -->
    <div class="row">
        <!-- Recent Contrats -->
        <div class="col-xl-6">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-file-contract text-muted me-2"></i> Réservations d'appartements récentes
                    </h3>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Chambre / Bien</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentContrats as $contrat)
                                <tr>
                                    <td class="fw-semibold fs-sm">{{ $contrat->user->name ?? 'N/A' }}</td>
                                    <td class="fs-sm">
                                        {{ $contrat->chambre->immobilier->titre ?? 'Chambre' }}
                                        <span class="text-muted">({{ $contrat->chambre->type ?? '' }})</span>
                                        @if($contrat->poulet_chair_qty > 0 || $contrat->poulet_cuit_qty > 0)
                                            <span class="badge bg-warning text-dark ms-1" title="Commande de poulet de chair: Vif: {{ $contrat->poulet_chair_qty }} / Cuit: {{ $contrat->poulet_cuit_qty }}">
                                                🐔 Poulet ({{ ($contrat->poulet_chair_qty ?? 0) + ($contrat->poulet_cuit_qty ?? 0) }})
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $contrat->statut === 'actif' ? 'success' : 'warning' }}">
                                            {{ ucfirst($contrat->statut) }}
                                        </span>
                                    </td>
                                    <td class="text-muted fs-sm">{{ $contrat->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Aucune réservation récente</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Tickets -->
        <div class="col-xl-6">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-ticket-alt text-muted me-2"></i> Réservations de tickets récentes
                    </h3>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Événement</th>
                                    <th>Qté</th>
                                    <th>Total</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTickets as $ticket)
                                <tr>
                                    <td class="fw-semibold fs-sm">{{ $ticket->user->name ?? 'N/A' }}</td>
                                    <td class="fs-sm">{{ $ticket->evenement->titre ?? 'Événement' }}</td>
                                    <td>{{ $ticket->quantite }}</td>
                                    <td class="fw-bold">{{ number_format($ticket->montant_total, 2, ',', ' ') }} MAD</td>
                                    <td>
                                        <span class="badge bg-{{ $ticket->statut === 'paye' ? 'success' : 'warning' }}">
                                            {{ ucfirst($ticket->statut) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Aucune vente de ticket récente</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        const ctx = document.getElementById('offersChart').getContext('2d');
        const labels = {!! json_encode($labels) !!};
        const dataValues = {!! json_encode($data) !!};

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Offres publiées",
                    data: dataValues,
                    borderColor: '#2b6cb0',
                    backgroundColor: 'rgba(43, 108, 176, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
