@extends('layouts.app')

@section('title', 'Détail du participant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-blue-700">
            Détail du participant
        </div>
        <div class="space-y-2">
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Utilisateur :</span> {{ $participant->user->name ?? '-' }}</p>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Email :</span> {{ $participant->user->email ?? '-' }}</p>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Événement :</span> {{ $participant->event->title ?? '-' }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('participants.edit', $participant) }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded shadow">
                Modifier
            </a>
            <form action="{{ route('participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Supprimer ce participant ?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('participants.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection