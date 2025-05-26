@extends('adminlte::page')

@section('title', 'Tableau d\'affichage')

@section('content_header')
<h1>📋 Tableau d'affichage</h1>
@stop

@section('content')
<div class="row">
    <!-- Info Boxes -->
    <div class="col-md-6 col-sm-6 col-12">
        <x-adminlte-info-box title="Total des Posts" text="{{ $totalPosts }}" icon="fas fa-newspaper" theme="primary" />
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <x-adminlte-info-box title="Total des Catégories" text="{{ $totalCategories }}" icon="fas fa-tags" theme="info" />
    </div>
</div>

<div class="row">
    <!-- Most Used Category -->
    <div class="col-md-6">
        <x-adminlte-small-box title="Catégorie la plus utilisée" text="{{ $mostUsedCategory->nom ?? 'Aucune' }}" icon="fas fa-star" theme="warning" />
    </div>

    <!-- Latest Post Highlight -->
    <div class="col-md-6">
        @if($posts->first())
        <x-adminlte-small-box title="Dernier Post Créé" text="{{ $posts->first()->titre }}" icon="fas fa-clock" theme="dark" />
        @endif
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <x-adminlte-card title="Nombre de Posts par Catégorie" theme="teal" icon="fas fa-chart-bar">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Catégorie</th>
                        <th>Nombre de Posts</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postsPerCategory as $cat)
                    <tr>
                        <td>{{ $cat->nom }}</td>
                        <td>{{ $cat->posts_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </x-adminlte-card>
    </div>

    <div class="col-md-6">
        <x-adminlte-card title="Utilisation des Catégories (%)" theme="indigo" icon="fas fa-percentage">
            @php
            $total = $postsPerCategory->sum('posts_count');
            @endphp
            @foreach ($postsPerCategory as $cat)
            @php
            $percent = $total > 0 ? round(($cat->posts_count / $total) * 100) : 0;
            @endphp
            <p class="mb-1">{{ $cat->nom }} <span class="float-right">{{ $percent }}%</span></p>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: {{ $percent }}%"></div>
            </div>
            @endforeach
        </x-adminlte-card>
    </div>
</div>
{{-- <div class="row mt-4">
    <!-- Recent Posts Table -->
    <div class="col-md-12">
        <x-adminlte-card title="5 Derniers Posts" theme="lightblue" icon="fas fa-list">
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
</div> --}}
@stop
