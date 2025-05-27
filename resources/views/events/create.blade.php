@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un événement</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
            @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
            @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="place_id" class="form-label">Lieu</label>
            <select name="place_id" id="place_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" @if(old('place_id') == $place->id) selected @endif>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Enregistrer</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection