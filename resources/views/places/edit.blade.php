@extends('layouts.app')

@section('title', 'Modifier le lieu')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="place-edit-title">
            Modifier le lieu
        </div>
        <form method="POST" action="{{ route('places.update', $place) }}" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="label-yellow">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $place->name) }}"
                    required
                    class="input-yellow">
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="address" class="label-yellow">Adresse</label>
                <input type="text" name="address" id="address"
                    value="{{ old('address', $place->address) }}"
                    class="input-yellow">
                @error('address') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="description" class="label-yellow">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="input-yellow">{{ old('description', $place->description) }}</textarea>
                @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-yellow-gradient">
                    Enregistrer
                </button>
                <a href="{{ route('places.index') }}" class="btn-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection