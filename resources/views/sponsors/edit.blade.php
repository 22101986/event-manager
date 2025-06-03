@extends('layouts.app')

@section('title', 'Modifier le sponsor')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="sponsor-edit-title">
            Modifier le sponsor
        </div>
        <form method="POST" action="{{ route('sponsors.update', $sponsor) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="label-yellow">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $sponsor->name) }}"
                    required
                    class="input-yellow">
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="logo" class="label-yellow">Logo (fichier)</label>
                <input type="file" name="logo" id="logo" accept="image/*" class="image-yellow">
                @error('logo') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="event_id" class="label-yellow">Événement</label>
                <select name="event_id" id="event_id" class="input-yellow" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id', $sponsor->event_id) == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
                @error('event_id') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-yellow-gradient">
                    Enregistrer
                </button>
                <a href="{{ route('sponsors.index') }}" class="btn-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection