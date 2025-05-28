@extends('layouts.app')

@section('content')
    <h1>Modifier le participant</h1>
    <form method="POST" action="{{ route('participants.update', $participant) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $participant->name) }}" required>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $participant->email) }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="phone">Téléphone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $participant->phone) }}">
            @error('phone') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('participants.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection