@extends('layouts.app')

@section('title', 'Ajouter un sponsor')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="sponsor-title">
            Ajouter un sponsor
        </div>
        <form method="POST" action="{{ route('sponsors.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="label-green">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name') }}"
                    required
                    class="input-green">
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="logo" class="label-green">Logo (fichier)</label>
                <input type="file" name="logo" id="logo" accept="image/*" class="image-green">
                @error('logo') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="event_id" class="label-green">Événement</label>
                <select name="event_id" id="event_id" class="input-green" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
                @error('event_id') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-green-gradient">
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