@extends('adminlte::page')

@section('title', 'Gestion des Posts')

@section('content_header')
<h1 class="mb-4">📝 Gestion des Posts</h1>
@stop

@section('content')
@if(session('success'))
<x-adminlte-alert theme="success" title="Succès">
    {{ session('success') }}
</x-adminlte-alert>
@endif

<div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter un post
    </a>
</div>

<x-adminlte-card title="🔎 Rechercher & Filtrer" theme="light" collapsible>
    <form method="GET" action="{{ route('posts.index') }}">
        <div class="row">
            <div class="col-md-5">
                <x-adminlte-input name="search" type="search" label="Titre" placeholder="Tapez le titre..." value="{{ request('search') }}" />
            </div>
            <div class="col-md-4">
                <x-adminlte-select name="category_id" label="Catégorie">
                    <option value="">-- Toutes les catégories --</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                    @endforeach
                </x-adminlte-select>
            </div>
            <div style="display:flex; align-items: center; justify-content: center;" class="col-md-3 d-flex justify-content-end">
                <x-adminlte-button type="submit" theme="primary" icon="fas fa-filter" class="mr-2" />
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-sync"></i>
                </a>
            </div>
        </div>
    </form>
</x-adminlte-card>

<x-adminlte-card theme="light" title="📋 Liste des Posts">
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="thead-light">
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->titre }}</td>
                    <td>{{ $post->categorie->nom ?? '—' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($post->description, 50) }}</td>
                    <td>
                        @if ($post->image_url)
                        <img src="{{ asset($post->image_url) }}" alt="Post Image" class="img-thumbnail" style="width: 60px;">
                        @else
                        —
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Supprimer ce post ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Aucun post trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $posts->withQueryString()->links() }}
    </div>
</x-adminlte-card>
@stop
