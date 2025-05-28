@extends('adminlte::page')

@section('title', 'Gestion des Posts')

@section('content_header')
<h1>📝 Gestion des Posts</h1>
@stop

@section('content')
@if(session('success'))
<x-adminlte-alert theme="success" title="Succès">
    {{ session('success') }}
</x-adminlte-alert>
@endif

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Ajouter un post
</a>

<x-adminlte-card theme="light" icon="fas fa-table" title="Liste des Posts">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Image</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <td>{{ $post->titre }}</td>
                <td>{{ $post->categorie->nom ?? '—' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->description, 50) }}</td>
                <td>
                    @if($post->image_url)
                    <img src="{{ $post->image_url }}" width="60" alt="Image post">
                    @else
                    —
                    @endif
                </td>
                <td class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Supprimer ce post ?')">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button type="submit" theme="danger" icon="fas fa-trash" label="Supprimer" />
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Aucun post trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $posts->links() }}
</x-adminlte-card>
@stop