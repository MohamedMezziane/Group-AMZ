@extends('adminlte::page')

@section('title', 'Gestion des Ateliers')

@section('content_header')
<h1 class="text-info">📝 Gestion des Ateliers</h1>
@stop

@section('content')
@if(session('success'))
<x-adminlte-alert theme="success" title="Succès">
    {{ session('success') }}
</x-adminlte-alert>
@endif

<div class="mb-3 text-right">
    <a href="{{ route('ateliers.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Ajouter un Atelier
    </a>
</div>

<x-adminlte-card theme="light" icon="fas fa-table" title="Liste des Ateliers">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ateliers as $atelier)
                <tr>
                    <td>{{ $atelier->nom }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($atelier->description, 50) }}</td>
                    <td>{{ \Carbon\Carbon::parse($atelier->dateDebut)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($atelier->dateFin)->format('d/m/Y') }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('ateliers.edit', $atelier) }}" class="btn btn-sm btn-primary me-2">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <div class="mx-2"></div> <!-- Espace ajouté ici -->
                            <form action="{{ route('ateliers.destroy', $atelier->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet atelier ?')">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button type="submit" theme="danger" icon="fas fa-trash" label="Supprimer" />
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun atelier trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $ateliers->links() }}
</x-adminlte-card>
@stop