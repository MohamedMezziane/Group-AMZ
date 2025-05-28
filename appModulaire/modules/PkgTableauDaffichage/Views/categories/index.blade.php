@extends('adminlte::page')

@section('title', 'Catégories des Posts')

@section('content_header')
<h1>📁 Gestion des Catégories</h1>
@stop

@section('content')

{{-- Success Message --}}
@if(session('success'))
<x-adminlte-alert theme="success" title="Succès">
    {{ session('success') }}
</x-adminlte-alert>
@endif

{{-- Create or Edit Form --}}
<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST" class="mb-4">
    @csrf
    @if(isset($category))
    @method('PUT')
    @endif

    <x-adminlte-input name="nom" label="{{ isset($category) ? 'Modifier le nom' : 'Nom de la Catégorie' }}" placeholder="Saisir le nom..." fgroup-class="col-md-6" value="{{ old('nom', $category->nom ?? '') }}" />

    @error('nom')
    <x-adminlte-alert theme="danger" title="Erreur">
        {{ $message }}
    </x-adminlte-alert>
    @enderror

    <x-adminlte-button type="submit" label="{{ isset($category) ? 'Mettre à jour' : 'Créer' }}" theme="primary" icon="fas fa-save" />
</form>

{{-- Category List --}}
<x-adminlte-card title="📂 Liste des Catégories" theme="light" icon="fas fa-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th class="d-flex gap-2 justify-content-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->nom }}</td>
                <td class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-info mr-1">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" theme="danger" icon="fas fa-trash" label="Supprimer" />
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Aucune catégorie trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-adminlte-card>

@stop
