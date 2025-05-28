@extends('layouts.app')

@section('content')
    <h1>Ajouter un intervenant</h1>
    <form method="POST" action="{{ route('speakers.store') }}">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio">{{ old('bio') }}</textarea>
            @error('bio') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('speakers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection