@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'événement</h1>
    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title) }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Date de début</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', \Illuminate\Support\Carbon::parse($event->start_date)->format('Y-m-d\TH:i')) }}" required>
            @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Date de fin</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $event->end_date ? \Illuminate\Support\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : '') }}">
            @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="place_id" class="form-label">Lieu</label>
            <select name="place_id" id="place_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" @if(old('place_id', $event->place_id) == $place->id) selected @endif>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection