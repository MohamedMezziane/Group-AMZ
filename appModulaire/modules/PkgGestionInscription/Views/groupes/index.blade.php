@extends('adminlte::page')

@section('title', 'Liste des Groupes')

@section('content')
<h1>Liste des Groupes</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('groupes.create') }}" class="btn btn-success mb-3">Ajouter un Groupe</a>

<x-adminlte-card title="🔎 Rechercher & Filtrer" theme="light" collapsible>
    <form method="GET" action="{{ route('groupes.index') }}">
        <div class="row">
            <div class="col-md-4">
                <x-adminlte-input name="search" type="search" label="Nom du Groupe" placeholder="Tapez le nom..." value="{{ request('search') }}" />
            </div>
            <div class="col-md-4">
                <x-adminlte-select name="atelierId" label="Atelier">
                    <option value="">-- Tous les Ateliers --</option>
                    @foreach ($ateliers as $atelier)
                    <option value="{{ $atelier->id }}" {{ request('atelierId') == $atelier->id ? 'selected' : '' }}>
                        {{ $atelier->nom }}
                    </option>
                    @endforeach
                </x-adminlte-select>
            </div>
            <div class="col-md-4 d-flex justify-content-end align-items-center">
                <x-adminlte-button type="submit" theme="primary" icon="fas fa-filter" class="mr-2" />
                <a href="{{ route('groupes.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-sync"></i>
                </a>
            </div>
        </div>
    </form>
</x-adminlte-card>
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
                    <div class="mx-2"></div> <!-- Espace ajouté ici -->
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