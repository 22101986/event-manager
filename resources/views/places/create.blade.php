@extends('layouts.app')

@section('content')
    <h1>Ajouter un lieu</h1>
    <form method="POST" action="{{ route('places.store') }}">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}">
            @error('address') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('places.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection