@extends('layouts.app')

@section('title', 'Ajouter un lieu')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="section-title">
            Ajouter un lieu
        </div>
        <form method="POST" action="{{ route('places.store') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="label-blue">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name') }}"
                    required
                    class="input-blue">
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="address" class="label-blue">Adresse</label>
                <input type="text" name="address" id="address"
                    value="{{ old('address') }}"
                    class="input-blue">
                @error('address') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="description" class="label-blue">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="input-blue">{{ old('description') }}</textarea>
                @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit" class="btn-blue-gradient">
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