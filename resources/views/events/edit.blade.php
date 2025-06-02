@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto my-12 bg-white rounded-3xl shadow-lg p-8">
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-8 text-center">Modifier l'événement</h1>
    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block font-semibold text-indigo-600 mb-1">Titre</label>
            <input type="text" name="title" id="title"
                   class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition"
                   value="{{ old('title', $event->title) }}" required>
            @error('title') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="description" class="block font-semibold text-indigo-600 mb-1">Description</label>
            <textarea name="description" id="description" rows="3"
                      class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition">{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="flex flex-col sm:flex-row gap-6">
            <div class="flex-1">
                <label for="start_date" class="block font-semibold text-indigo-600 mb-1">Date de début</label>
                <input type="datetime-local" name="start_date" id="start_date"
                       class="w-full border-2 border-pink-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-200 transition"
                       value="{{ old('start_date', \Illuminate\Support\Carbon::parse($event->start_date)->format('Y-m-d\TH:i')) }}" required>
                @error('start_date') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex-1">
                <label for="end_date" class="block font-semibold text-indigo-600 mb-1">Date de fin</label>
                <input type="datetime-local" name="end_date" id="end_date"
                       class="w-full border-2 border-pink-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-pink-600 focus:ring-2 focus:ring-pink-200 transition"
                       value="{{ old('end_date', $event->end_date ? \Illuminate\Support\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : '') }}">
                @error('end_date') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
        </div>
        <div>
            <label for="poster" class="block font-semibold text-indigo-600 mb-1">Affiche de l'événement</label>
            <input type="file" name="poster" id="poster" accept="image/*"
                   class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700">
            @error('poster') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="place_id" class="block font-semibold text-indigo-600 mb-1">Lieu</label>
            <select name="place_id" id="place_id"
                    class="w-full border-2 border-indigo-300 rounded-lg px-4 py-2 text-gray-900 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition">
                <option value="">-- Aucun --</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" @if(old('place_id', $event->place_id) == $place->id) selected @endif>{{ $place->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-between gap-4 pt-4">
            <button type="submit"
                    class="bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-indigo-600 hover:to-pink-600 transition">
                Mettre à jour
            </button>
            <a href="{{ route('events.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection