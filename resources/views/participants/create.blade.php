@extends('layouts.app')

@section('title', 'Ajouter un participant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="participant-title">
            Ajouter un participant
        </div>
        <form method="POST" action="{{ route('participants.store') }}" class="space-y-6">
            @csrf
            <div>
                <label for="user_id" class="label-green">Utilisateur</label>
                <select name="user_id" id="user_id" class="input-green" required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
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
                @error('event_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-green-gradient">
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