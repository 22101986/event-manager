@extends('layouts.app')

@section('title', 'Modifier le lieu')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-warning text-white">
            Modifier le lieu
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('places.update', $place) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $place->name) }}" required class="form-control">
                    @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $place->address) }}" class="form-control">
                    @error('address') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $place->description) }}</textarea>
                    @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('places.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection