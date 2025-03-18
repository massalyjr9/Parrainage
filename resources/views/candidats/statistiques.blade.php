@extends('layouts.appCandidat')

@section('content')
<div class="container">
    <h1>Statistiques des Candidats</h1>
    <div class="row">
        <div class="col-md-6">
            <canvas id="candidatsChart"></canvas>
        </div>
        <div class="col-md-6">
            <h3>Détails des Statistiques</h3>
            <ul>
                <li>Total des candidats: {{ $totalCandidats }}</li>
                <li>Candidats acceptés: {{ $candidatsAcceptes }}</li>
                <li>Candidats en attente: {{ $candidatsEnAttente }}</li>
                <li>Candidats rejetés: {{ $candidatsRejectes }}</li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('candidatsChart').getContext('2d');
    var candidatsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Acceptés', 'En attente', 'Rejetés'],
            datasets: [{
                label: 'Nombre de Candidats',
                data: [{{ $candidatsAcceptes }}, {{ $candidatsEnAttente }}, {{ $candidatsRejectes }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection