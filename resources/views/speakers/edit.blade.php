@extends('layouts.app')

@section('title', 'Modifier l\'intervenant')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-warning text-white">
            Modifier l'intervenant
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('speakers.update', $speaker) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $speaker->name) }}" required class="form-control">
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="event_id" class="form-label">Événement</label>
                    <select name="event_id" id="event_id" class="form-select" required>
                        <option value="">-- Sélectionner --</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}" {{ old('event_id', $speaker->event_id) == $event->id ? 'selected' : '' }}>
                                {{ $event->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('event_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio', $speaker->bio) }}</textarea>
                    @error('bio') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image (fichier)</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('speakers.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection