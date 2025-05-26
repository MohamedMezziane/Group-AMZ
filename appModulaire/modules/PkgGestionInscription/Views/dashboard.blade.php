<!-- resources/views/dashboard.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inscriptions</h1>
@stop

@section('content')
    <div class="row">
        <!-- Statistics Cards -->
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Apprenants</h5>
                    <p class="card-text">{{ $apprenants->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Ateliers</h5>
                    <p class="card-text">{{ $ateliers->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Groupes</h5>
                    <p class="card-text">{{ $groupes->count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Inscriptions</h5>
                    <p class="card-text">{{ $inscriptions->count() }}</p>
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

    <!-- <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Inscriptions</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Apprenant</th>
                        <th>Atelier</th>
                        <th>Groupe</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->apprenant->nom ?? 'N/A' }}</td>
                            <td>{{ $inscription->atelier->nom ?? 'N/A' }}</td>
                            <td>{{ $inscription->groupe->nom ?? 'N/A' }}</td>
                            <td>{{ $inscription->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> -->
@stop