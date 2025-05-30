@extends('adminlte::page')

@section('title', 'Ajouter un Groupe')

@section('content')
<h1>Ajouter un Groupe</h1>

<form action="{{ route('groupes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>Atelier</label>
        <select name="atelierId" class="form-control" required>
            @foreach ($ateliers as $atelier)
            <option value="{{ $atelier->id }}">{{ $atelier->nom }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Max Participants</label>
        <input type="number" name="maxParticipants" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
@stop