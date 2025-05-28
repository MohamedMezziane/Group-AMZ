@extends('adminlte::page')

@section('title', 'Modifier Atelier')

@section('content_header')
    <h1>✏️ Modifier Atelier</h1>
@stop

@section('content')
    <form action="{{route('ateliers.edit', $atelier)  }}" method="POST">
        @csrf
        @method('PUT')

        <x-adminlte-input
            name="nom"
            label="Nom"
            value="{{ old('nom', $atelier->nom) }}"
            required
            autofocus
        />

        <x-adminlte-textarea
            name="description"
            label="Description"
            rows="4"
            required
        >{{ old('description', $atelier->description) }}</x-adminlte-textarea>

        <x-adminlte-input
            name="dateDebut"
            label="Date Début"
            type="datetime-local"
            value="{{ old('dateDebut', \Carbon\Carbon::parse($atelier->dateDebut)->format('Y-m-d\TH:i')) }}"
            required
        />

        <x-adminlte-input
            name="dateFin"
            label="Date Fin"
            type="datetime-local"
            value="{{ old('dateFin', \Carbon\Carbon::parse($atelier->dateFin)->format('Y-m-d\TH:i')) }}"
            required
        />

        <x-adminlte-button
            type="submit"
            label="Mettre à jour"
            theme="success"
            icon="fas fa-check"
        />
    </form>
@stop
