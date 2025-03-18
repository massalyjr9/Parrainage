@extends('layouts.baseDashboard')

@section('title', 'Tableau de Bord')

@section('content')
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl text-gray-800 mb-6">Statistiques des Parrainages</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Graphique en ligne -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Évolution des Parrainages</h2>
                <canvas id="lineChart"></canvas>
            </div>

            <!-- Graphique en barres -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">Comparaison des Parrainages par Mois</h2>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            // Graphique en ligne (évolution des parrainages)
            const ctx1 = document.getElementById('lineChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: @json($lineChartLabels),
                    datasets: [{
                        label: 'Nombre de Parrainages',
                        data: @json($lineChartData),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Graphique en barres (parrainages par mois)
            const ctx2 = document.getElementById('barChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: @json($barChartLabels),
                    datasets: [{
                        label: 'Nombre de Parrainages',
                        data: @json($barChartData),
                        backgroundColor: @json($barChartColors),
                        borderColor: @json($barChartBorderColors),
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
