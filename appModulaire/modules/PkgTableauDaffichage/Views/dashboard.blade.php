@extends('adminlte::page')

@section('title', 'Tableau d\'affichage')

@section('content_header')
<h1 class="mb-4">📋 Tableau d'affichage</h1>
@stop

@section('content')
{{-- Stats Overview --}}
<div class="row mb-3">
    <div class="col-md-6">
        <x-adminlte-info-box title="Total des Posts" text="{{ $totalPosts }}" icon="fas fa-newspaper" theme="primary" />
    </div>
    <div class="col-md-6">
        <x-adminlte-info-box title="Total des Catégories" text="{{ $totalCategories }}" icon="fas fa-tags" theme="info" />
    </div>
</div>

{{-- Highlights --}}
<div class="row mb-4">
    <div class="col-md-6">
        <x-adminlte-small-box title="Catégorie la plus utilisée" text="{{ $mostUsedCategory->nom ?? 'Aucune' }}" icon="fas fa-star" theme="warning" />
    </div>
    <div class="col-md-6">
        @if($posts->first())
        <x-adminlte-small-box title="Dernier Post Créé" text="{{ $posts->first()->titre }}" icon="fas fa-clock" theme="dark" />
        @else
        <x-adminlte-small-box title="Dernier Post Créé" text="Aucun" icon="fas fa-clock" theme="secondary" />
        @endif
    </div>
</div>

{{-- Data Visualizations --}}
<div class="row">
    {{-- Posts Count per Category --}}
    <div class="col-md-6">
        <x-adminlte-card title="📊 Nombre de Posts par Catégorie" theme="teal">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Catégorie</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($postsPerCategory as $cat)
                    <tr>
                        <td>{{ $cat->nom }}</td>
                        <td>{{ $cat->posts_count }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-muted text-center">Aucune donnée</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </x-adminlte-card>
    </div>

    {{-- Category Usage (%) --}}
    <div class="col-md-6">
        <x-adminlte-card title="📈 Utilisation des Catégories (%)" theme="indigo">
            @php $total = $postsPerCategory->sum('posts_count'); @endphp
            @forelse ($postsPerCategory as $cat)
            @php $percent = $total > 0 ? round(($cat->posts_count / $total) * 100) : 0; @endphp
            <div class="mb-2">
                <span class="font-weight-bold">{{ $cat->nom }}</span>
                <span class="float-right text-muted">{{ $percent }}%</span>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            @empty
            <p class="text-muted">Aucune donnée à afficher.</p>
            @endforelse
        </x-adminlte-card>
    </div>
</div>

{{-- Uncomment this block if you want to include recent posts --}}
{{--
    <div class="row mt-4">
        <div class="col-md-12">
            <x-adminlte-card title="📝 5 Derniers Posts" theme="lightblue" icon="fas fa-list">
                <table class="table table-striped">
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
<td>{{ Str::limit($post->description, 50) }}</td>
<td>
    @if ($post->image_url)
    <img src="{{ asset($post->image_url) }}" alt="Image" width="60">
    @else
    —
    @endif
</td>
</tr>
@endforeach
</tbody>
</table>
</x-adminlte-card>
</div>
</div>
--}}
@stop