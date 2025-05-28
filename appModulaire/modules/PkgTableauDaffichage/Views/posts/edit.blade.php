@extends('adminlte::page')

@section('title', 'Modifier Post')

@section('content_header')
<h1>✏️ Modifier Post</h1>
@stop

@section('content')
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-adminlte-input name="titre" label="Titre" value="{{ old('titre', $post->titre) }}" />
    <x-adminlte-input name="image_url" label="URL de l'image" value="{{ old('image_url', $post->image_url) }}" />
    <x-adminlte-textarea name="description" label="Description">{{ old('description', $post->description) }}</x-adminlte-textarea>

    <x-adminlte-select name="categorie_id" label="Catégorie">
        <option value="">-- Choisir une catégorie --</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected(old('categorie_id', $post->categorie_id) == $category->id)>{{ $category->nom }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-button type="submit" label="Mettre à jour" theme="success" icon="fas fa-check" />
</form>
@stop