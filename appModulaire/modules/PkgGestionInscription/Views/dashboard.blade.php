<!-- resources/views/dashboard.blade.php -->
@extends('adminlte::page')

@section('title', 'Tableau de Bord')

@section('content_header')
    <h1>Tableau de Bord des Inscriptions</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Apprenants</h5>
                    <p class="card-text">{{ $apprenantsTotal->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Ateliers</h5>
                    <p class="card-text">{{ $ateliers->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Groupes</h5>
                    <p class="card-text">{{ $groupes->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Inscriptions</h5>
                    <p class="card-text">{{ $inscriptions->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Statistiques des Inscriptions</h3>
                </div>
                <div class="card-body">
                    <canvas id="inscriptionChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Total des Inscriptions, Ateliers et Groupes</h3>
                </div>
                <div class="card-body">
                    <canvas id="totalChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Apprenants</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($apprenants as $apprenant)
                            <li class="list-group-item">{{ $apprenant->nom }} ({{ $apprenant->statut }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ateliers</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($ateliers as $atelier)
                            <li class="list-group-item">{{ $atelier->nom }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Groupes</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($groupes as $groupe)
                            <li class="list-group-item">{{ $groupe->nom }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx1 = document.getElementById('inscriptionChart').getContext('2d');
        const inscriptionChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Apprenants', 'Ateliers', 'Groupes', 'Inscriptions'],
                datasets: [{
                    label: 'Total',
                    data: [{{ $apprenantsTotal->count() }}, {{ $ateliers->count() }}, {{ $groupes->count() }}, {{ $inscriptions->count() }}],
                    backgroundColor: ['#17a2b8', '#28a745', '#ffc107', '#dc3545'],
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

        const ctx2 = document.getElementById('totalChart').getContext('2d');
        const totalChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Apprenants', 'Ateliers', 'Groupes', 'Inscriptions'],
                datasets: [{
                    label: 'Total',
                    data: [
                        {{ $apprenantsTotal->count() }},
                        {{ $ateliers->count() }},
                        {{ $groupes->count() }},
                        {{ $inscriptions->count() }}
                    ],
                    backgroundColor: ['#007bff', '#6f42c1', '#ffc107', '#dc3545'],
                }]
            }
        });
    </script>
@endpush