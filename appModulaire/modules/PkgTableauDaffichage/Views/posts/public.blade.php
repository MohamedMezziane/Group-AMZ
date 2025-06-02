@extends('layouts.app') {{-- or any public layout --}}

@section('title', 'Tous les Posts')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Tous les Posts</h1>

    <div class="row">
        @forelse($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($post->image_url)
                <img src="{{ asset($post->image_url) }}" class="card-img-top" alt="Image du post" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->titre }}</h5>
                    <p class="text-muted"><i class="fas fa-tag"></i> {{ $post->categorie->nom ?? 'Sans catégorie' }}</p>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->description, 100) }}</p>
                    <p class="card-text text-muted">
                        Publié le {{ $post->created_at->format('d/m/Y à H:i') }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Aucun post trouvé.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection