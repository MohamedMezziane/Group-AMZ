@extends('adminlte::page')

@section('title', 'Modifier Post')

@section('content_header')
<h1>✏️ Modifier Post</h1>
@stop

@section('content')
<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <x-adminlte-input name="titre" label="Titre" fgroup-class="col-md-6" value="{{ old('titre', $post->titre) }}" />

    <x-adminlte-textarea name="description" label="Description" fgroup-class="col-md-12">
        {{ old('description', $post->description) }}
    </x-adminlte-textarea>

    <x-adminlte-select name="categorie_id" label="Catégorie" fgroup-class="col-md-6">
        @foreach ($categories as $cat)
        <option value="{{ $cat->id }}" @selected(old('categorie_id', $post->categorie_id) == $cat->id)>
            {{ $cat->nom }}
        </option>
        @endforeach
    </x-adminlte-select>

    @if ($post->image_url)
    <p class="text-muted">Image actuelle :</p>
    <img src="{{ asset($post->image_url) }}" width="100" class="mb-2">
    @endif

    <x-adminlte-input name="image" type="file" label="Nouvelle Image (optionnel)" fgroup-class="col-md-6" />

    <x-adminlte-button type="submit" label="Mettre à jour" theme="primary" icon="fas fa-save" />
</form>
@stop
