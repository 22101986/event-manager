@extends('layouts.app')

@section('title', 'Ajouter un participant')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-success text-white">
            Ajouter un participant
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('participants.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Utilisateur</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">-- Sélectionner --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="event_id" class="form-label">Événement</label>
                    <select name="event_id" id="event_id" class="form-select" required>
                        <option value="">-- Sélectionner --</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                {{ $event->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('event_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('participants.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection