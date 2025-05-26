@extends('adminlte::page')

@section('title', 'Gestion des Posts')

@section('content_header')
    <h1>📝 Gestion des Posts</h1>
@stop

@section('content')
<x-adminlte-card title="Tous les Posts" theme="light" icon="fas fa-table">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->titre }}</td>
                <td>{{ $post->categorie->nom ?? '—' }}</td>
                <td>{{ Str::limit($post->description, 80) }}</td>
                <td>
                    @if ($post->image_url)
                        <img src="{{ asset($post->image_url) }}" width="60">
                    @else
                        —
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(method_exists($posts, 'links'))
        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    @endif
</x-adminlte-card>
@stop
