@extends('adminlte::page')

@section('title', 'Modifier un Groupe')

@section('content')
<h1>Modifier un Groupe</h1>

<form action="{{ route('groupes.update', $groupe) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ $groupe->nom }}" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $groupe->description }}</textarea>
    </div>
    <div class="form-group">
        <label>Atelier</label>
        <select name="atelierId" class="form-control" required>
            @foreach ($ateliers as $atelier)
            <option value="{{ $atelier->id }}" {{ $atelier->id == $groupe->atelierId ? 'selected' : '' }}>
                {{ $atelier->nom }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Max Participants</label>
        <input type="number" name="maxParticipants" class="form-control" value="{{ $groupe->maxParticipants }}" required>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
</form>
@stop