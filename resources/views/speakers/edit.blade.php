@extends('layouts.app')

@section('title', 'Modifier l\'intervenant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="speaker-edit-title">
            Modifier l'intervenant
        </div>
        <form method="POST" action="{{ route('speakers.update', $speaker) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="label-yellow">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $speaker->name) }}"
                    required
                    class="input-yellow">
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="event_id" class="label-yellow">Événement</label>
                <select name="event_id" id="event_id" class="input-yellow" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id', $speaker->event_id) == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
                @error('event_id') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="bio" class="label-yellow">Bio</label>
                <textarea name="bio" id="bio" rows="4" class="input-yellow">{{ old('bio', $speaker->bio) }}</textarea>
                @error('bio') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="image" class="label-yellow">Image (fichier)</label>
                <input type="file" name="image" id="image" accept="image/*" class="image-yellow">
                @error('image') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-yellow-gradient">
                    Enregistrer
                </button>
                <a href="{{ route('speakers.index') }}" class="btn-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection