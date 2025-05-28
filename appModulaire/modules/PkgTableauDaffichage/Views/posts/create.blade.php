@extends('adminlte::page')

@section('title', 'Créer un Post')

@section('content_header')
<h1>➕ Créer un nouveau Post</h1>
@stop

@section('content')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <x-adminlte-input name="titre" label="Titre" placeholder="Entrez le titre..." fgroup-class="col-md-6" />

    <x-adminlte-textarea name="description" label="Description" fgroup-class="col-md-12" />

    <x-adminlte-select name="categorie_id" label="Catégorie" fgroup-class="col-md-6">
        @foreach ($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
        @endforeach
    </x-adminlte-select>

    <x-adminlte-input name="image" type="file" label="Image" fgroup-class="col-md-6" />

    <x-adminlte-button type="submit" label="Créer" theme="primary" icon="fas fa-save" />
</form>
@stop
