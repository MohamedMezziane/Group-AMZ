<!-- resources/views/dashboard.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inscriptions</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">apprenants</h3>
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Inscriptions</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>apprenant</th>
                        <th>Atelier</th>
                        <th>Groupe</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscriptions as $inscription)
                        <tr>
                            <td>{{ $inscription->apprenant->nom }}</td>
                            <td>{{ $inscription->atelier->nom }}</td>
                            <td>{{ $inscription->groupe->nom }}</td>
                            <td>{{ $inscription->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop