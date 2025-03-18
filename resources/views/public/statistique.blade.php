@extends('Utilisateurs.BaseDashboard')

@section('Contenus') < div class = "container mx-auto p-6" > <h1 class="text-3xl font-bold mb-6">Statistiques Générales</h1>

<!-- Statistiques Globales -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Total Électeurs</h2>
        <p class="text-2xl font-bold">{{ $totalElecteurs }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Total Parrainages</h2>
        <p class="text-2xl font-bold">{{ $totalParrainages }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Taux de Participation</h2>
        <p class="text-2xl font-bold">{{ number_format($tauxParticipation, 2) }}%</p>
    </div>
</div>

<!-- Recherche de Candidat -->
<div class="mt-6">
    <h2 class="text-2xl font-bold mb-4">Rechercher un Candidat</h2>
    <form method="GET" action="{{ route('statistiques') }}" class="flex space-x-2">
        <input
            type="text"
            name="search"
            placeholder="Nom du Parti ou Numéro Électeur"
            class="p-2 border rounded-lg flex-grow">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Rechercher</button>
        </form>
    </div>

    <!-- Résultat de la Recherche -->

    @if ($candidat)
    <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Statistiques du Candidat : {{ $candidat->nomPartiPolitique ?? 'Non disponible' }}</h2>
        <p>
            <strong>Slogan :</strong>
            {{ $candidat->slogan ?? 'Aucun slogan' }}</p>
        @if ($candidat->photo)
        <img
            src="{{ asset('images/'.$candidat->photo) }}"
            alt="Photo du Candidat"
            class="h-32 w-32 mt-4 rounded-lg">
            @else
            <p class="text-gray-500">Aucune photo disponible.</p>
            @endif
        </div>
        @endif

        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Évolution des Parrainages</h2>
            <canvas id="chartStat"></canvas>
        </div>

        <script>
            const ctx = document
                .getElementById('chartStat')
                .getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [
                        {
                            label: 'Parrainages par Mois',
                            data: @json($parrainages),
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2
                        }
                    ]
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

        @endsection
