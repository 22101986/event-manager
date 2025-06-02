@extends('layouts.app')

@section('title', 'Ajouter un lieu')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-blue-700">
            Ajouter un lieu
        </div>
        <form method="POST" action="{{ route('places.store') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block font-semibold text-blue-700 mb-1">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full border-2 border-blue-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition">
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="address" class="block font-semibold text-blue-700 mb-1">Adresse</label>
                <input type="text" name="address" id="address"
                    value="{{ old('address') }}"
                    class="w-full border-2 border-blue-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition">
                @error('address') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="description" class="block font-semibold text-blue-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border-2 border-blue-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition">{{ old('description') }}</textarea>
                @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-blue-600 hover:to-blue-800 transition">
                    Enregistrer
                </button>
                <a href="{{ route('places.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection