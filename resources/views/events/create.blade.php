@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto my-12 card-event">
    <h1 class="section-title">Créer un événement</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label for="title" class="label-base">Titre</label>
            <input type="text" name="title" id="title" class="input-base" value="{{ old('title') }}" required>
            @error('title') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="description" class="label-base">Description</label>
            <textarea name="description" id="description" rows="3" class="input-base">{{ old('description') }}</textarea>
        </div>
        <div class="flex flex-col sm:flex-row gap-6">
            <div class="flex-1">
                <label for="start_date" class="label-base">Date de début</label>
                <input type="datetime-local" name="start_date" id="start_date" class="input-date" value="{{ old('start_date') }}" required>
                @error('start_date') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex-1">
                <label for="end_date" class="label-base">Date de fin</label>
                <input type="datetime-local" name="end_date" id="end_date" class="input-date" value="{{ old('end_date') }}">
                @error('end_date') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
        </div>
        <div>
            <label for="poster" class="label-base">Affiche de l'événement</label>
            <input type="file" name="poster" id="poster" accept="image/*" class="input-base file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700">
            @error('poster') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="place_id" class="label-base">Lieu</label>
            <select name="place_id" id="place_id" class="input-base">
                <option value="">-- Aucun --</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" @if(old('place_id') == $place->id) selected @endif>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-between gap-4 pt-4">
            <button type="submit" class="btn-primary-gradient">Enregistrer</button>
            <a href="{{ route('events.index') }}" class="btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection