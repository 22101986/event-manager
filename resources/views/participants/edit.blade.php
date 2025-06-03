@extends('layouts.app')

@section('title', 'Modifier le participant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="participant-edit-title">
            Modifier le participant
        </div>
        <form method="POST" action="{{ route('participants.update', $participant) }}" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="user_id" class="label-yellow">Utilisateur</label>
                <select name="user_id" id="user_id" class="input-yellow" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $participant->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="event_id" class="label-yellow">Événement</label>
                <select name="event_id" id="event_id" class="input-yellow" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id', $participant->event_id) == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
                @error('event_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-yellow-gradient">
                    Enregistrer
                </button>
                <a href="{{ route('participants.index') }}" class="btn-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection