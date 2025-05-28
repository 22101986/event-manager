@extends('layouts.app')

@section('content')
    <h1>Modifier le sponsor</h1>
    <form method="POST" action="{{ route('sponsors.update', $sponsor) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $sponsor->name) }}" required>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $sponsor->email) }}">
            @error('email') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $sponsor->description) }}</textarea>
            @error('description') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection