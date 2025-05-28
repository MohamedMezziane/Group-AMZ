@extends('adminlte::page')

@section('title', 'Créer un Atelier')

@section('content_header')
<h1>➕ Créer un nouvel Atelier</h1>
@stop

@section('content')
<form action="{{ route('ateliers.store') }}" method="POST">
    @csrf

    <x-adminlte-input name="nom" label="Nom" placeholder="Nom de l'atelier" value="{{ old('nom') }}" />
    <x-adminlte-textarea name="description" label="Description" placeholder="Description de l'atelier">{{ old('description') }}</x-adminlte-textarea>
    <x-adminlte-input name="dateDebut" label="Date Début" type="datetime-local" value="{{ old('dateDebut') }}" />
    <x-adminlte-input name="dateFin" label="Date Fin" type="datetime-local" value="{{ old('dateFin') }}" />

    <x-adminlte-button type="submit" label="Créer" theme="primary" icon="fas fa-save" />
</form>
@stop