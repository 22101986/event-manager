@extends('layouts.app')

@section('title', 'Modifier le participant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-yellow-700">
            Modifier le participant
        </div>
        <form method="POST" action="{{ route('participants.update', $participant) }}" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="user_id" class="block font-semibold text-yellow-700 mb-1">Utilisateur</label>
                <select name="user_id" id="user_id"
                        class="w-full border-2 border-yellow-300 rounded-lg px-4 py-2 text-gray-900 focus:border-yellow-600 focus:ring-2 focus:ring-yellow-200 transition"
                        required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $participant->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div>
                <label for="event_id" class="block font-semibold text-yellow-700 mb-1">Événement</label>
                <select name="event_id" id="event_id"
                        class="w-full border-2 border-yellow-300 rounded-lg px-4 py-2 text-gray-900 focus:border-yellow-600 focus:ring-2 focus:ring-yellow-200 transition"
                        required>
                    <option value="">-- Sélectionner --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}" {{ old('event_id', $participant->event_id) == $event->id ? 'selected' : '' }}>
                            {{ $event->title }}
                        </option>
                    @endforeach
                </select>
                @error('event_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
            <div class="flex justify-between gap-4 pt-4">
                <button type="submit"
                        class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-yellow-500 hover:to-yellow-700 transition">
                    Enregistrer
                </button>
                <a href="{{ route('participants.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection