@extends('layouts.app')
@section('content')
    <div class="content">
        <!-- Simple -->
        <h2 class="content-heading">Simple</h2>
        <div class="row">
            <!-- Total Immobiliers -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded bg-primary" href="{{ route('immobiliers.index') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <i class="fa fa-building fa-2x text-white"></i>
                        <div class="ms-3 text-end">
                            <p class="fw-semibold text-white mb-0">Total Immobiliers</p>
                            <p class="fs-sm text-white-75 mb-0">{{ $totalImmobiliers }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Chambres disponibles -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded bg-gd-sublime" href="{{ route('chambres.index') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <i class="fa fa-bed fa-2x text-white"></i>
                        <div class="ms-3 text-end">
                            <p class="fw-semibold text-white mb-0">Chambres disponibles</p>
                            <p class="fs-sm text-white-75 mb-0">{{ $chambresDisponibles }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Contrats actifs -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded bg-primary-dark" href="{{ route('contrats.index') }}">
                    <div class="block-content block-content-full d-flex flex-row-reverse align-items-center justify-content-between">
                        <i class="fa fa-file-contract fa-2x text-white"></i>
                        <div class="me-3">
                            <p class="fw-semibold text-white mb-0">Contrats actifs</p>
                            <p class="fs-sm text-white-75 mb-0">{{ $contratsActifs }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Offres d'emploi -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded bg-success" href="{{ route('offre.index') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <i class="fa fa-briefcase fa-2x text-white"></i>
                        <div class="ms-3 text-end">
                            <p class="fw-semibold text-white mb-0">Offres d'emploi</p>
                            <p class="fs-sm text-white-75 mb-0">{{ $totalOffres }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Candidatures -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded bg-gd-dusk" href="{{ route('candidature.index') }}">
                    <div class="block-content block-content-full d-flex flex-row-reverse align-items-center justify-content-between">
                        <i class="fa fa-users fa-2x text-white"></i>
                        <div class="me-3">
                            <p class="fw-semibold text-white mb-0">Candidatures</p>
                            <p class="fs-sm text-white-75 mb-0">{{ $totalCandidatures }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Clients non candidats -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded bg-warning" href="#">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <i class="fa fa-user-times fa-2x text-white"></i>
                        <div class="ms-3 text-end">
                            <p class="fw-semibold text-white mb-0">Clients </p>
                            <p class="fs-sm text-white-75 mb-0">{{ $clientsNonCandidats }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Graphique circulaire --}}
        <div class="row">
            <!-- Graphique circulaire - Immobiliers -->
            <div class="col-md-6">
                <div class="block block-rounded mt-4">
                    <div class="block-header">
                        <h3 class="block-title">Répartition des Immobiliers</h3>
                    </div>
                    <div class="block-content">
                        <canvas id="immobilierPieChart" ></canvas>
                    </div>
                </div>
            </div>

            <!-- Graphique en barres - Offres -->
            <div class="col-md-6">
                <div class="block block-rounded mt-4">
                    <div class="block-header">
                        <h3 class="block-title">Offres publiées par mois ({{ now()->year }})</h3>
                    </div>
                    <div class="block-content">
                        <canvas id="offresChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Données pour les immobiliers
        const labelsImmobilier = ['Disponibles', 'Occupés'];
        const dataImmobilier = [{{ $immobiliersDisponibles }}, {{ $immobiliersOccupes }}];

        const totalImmobilier = dataImmobilier.reduce((a, b) => a + b, 0);

        // Graphique circulaire - Immobiliers avec pourcentages
        new Chart(document.getElementById('immobilierPieChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: labelsImmobilier,
                datasets: [{
                    label: 'Immobiliers',
                    data: dataImmobilier,
                    backgroundColor: [
                        'rgba(40, 167, 69, 0.7)',  // Vert
                        'rgba(220, 53, 69, 0.7)'   // Rouge
                    ],
                    borderColor: [
                        'rgba(40, 167, 69, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed;
                                let percentage = ((value / totalImmobilier) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Répartition des Immobiliers (en %)'
                    }
                }
            }
        });

        // Graphique en barres - Offres par mois (inchangé)
        new Chart(document.getElementById('offresChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Offres publiées',
                    data: {!! json_encode($data) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>

@endsection
