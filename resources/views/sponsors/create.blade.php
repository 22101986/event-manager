@extends('layouts.app')

@section('title', 'Ajouter un sponsor')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-green-700">
            Ajouter un sponsor
        </div>
        <form method="POST" action="{{ route('sponsors.store') }}" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block font-semibold text-green-700 mb-1">Nom</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full border-2 border-green-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-600 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition">
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="event_id" class="block font-semibold text-green-700 mb-1">Événement</label>
                <select name="event_id" id="event_id"
                        class="w-full border-2 border-green-300 rounded-lg px-4 py-2 text-gray-900 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition"
                        required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id') == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
                @error('event_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit"
                    class="bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-green-600 hover:to-green-800 transition">
                    Enregistrer
                </button>
                <a href="{{ route('sponsors.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection