@extends('adminlte::page')

@section('title', 'Gestion des Ateliers')

@section('content_header')
<h1>📝 Gestion des Ateliers</h1>
@stop

@section('content')
@if(session('success'))
<x-adminlte-alert theme="success" title="Succès">
    {{ session('success') }}
</x-adminlte-alert>
@endif

<a href="{{ route('ateliers.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Ajouter un Atelier
</a>

<x-adminlte-card theme="light" icon="fas fa-table" title="Liste des Ateliers">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ateliers as $atelier)
            <tr>
                <td>{{ $atelier->nom }}</td>
                <td>{{ \Illuminate\Support\Str::limit($atelier->description, 50) }}</td>
                <td>{{ $atelier->dateDebut }}</td>
                <td>{{ $atelier->dateFin }}</td>
                <td class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('ateliers.edit', $atelier) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('ateliers.destroy', $atelier->id) }}" method="POST" onsubmit="return confirm('Supprimer cet atelier ?')">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" theme="danger" icon="fas fa-trash" label="Supprimer" />
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aucun atelier trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $ateliers->links() }}
</x-adminlte-card>
@stop