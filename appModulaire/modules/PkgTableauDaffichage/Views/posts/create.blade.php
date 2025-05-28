@extends('adminlte::page')

@section('title', 'Créer un Post')

@section('content_header')
<h1>➕ Créer un nouveau Post</h1>
@stop

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <x-adminlte-input name="titre" label="Titre" placeholder="Titre du post" value="{{ old('titre') }}" />
    <x-adminlte-input name="image_url" label="URL de l'image" placeholder="https://example.com/image.jpg" value="{{ old('image_url') }}" />
    <x-adminlte-textarea name="description" label="Description" placeholder="Description du post">{{ old('description') }}</x-adminlte-textarea>

    <x-adminlte-select name="categorie_id" label="Catégorie">
        <option value="">-- Choisir une catégorie --</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected(old('categorie_id')==$category->id)>{{ $category->nom }}</option>
        @endforeach
    </x-adminlte-select>

    @error('titre')
    <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
    @enderror
    @error('categorie_id')
    <x-adminlte-alert theme="danger">{{ $message }}</x-adminlte-alert>
    @enderror

    <x-adminlte-button type="submit" label="Créer" theme="primary" icon="fas fa-save" />
</form>
@stop