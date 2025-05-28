@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Inscriptions</h1>
@stop

@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Liste des Inscriptions</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
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
    </div>
</div>

@stop