@extends('adminlte::page')

@section('title', 'Liste des Groupes')

@section('content')
<h1>Liste des Groupes</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('groupes.create') }}" class="btn btn-success mb-3">Ajouter un Groupe</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Atelier</th>
            <th>Max Participants</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groupes as $groupe)
        <tr>
            <td>{{ $groupe->nom }}</td>
            <td>{{ $groupe->description }}</td>
            <td>{{ $groupe->atelier->description }}</td>
            <td>{{ $groupe->maxParticipants }}</td>
            <td class="text-center">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('groupes.edit', $groupe) }}" class="btn btn-warning me-2">Modifier</a>
                    <form action="{{ route('groupes.destroy', $groupe) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce groupe ?')">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop