@extends('layouts.app')

@section('title', 'Détail de l\'intervenant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-blue-700">
            Détail de l'intervenant
        </div>
        @if($speaker->image)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $speaker->image) }}" alt="Photo de {{ $speaker->name }}" class="rounded-xl shadow-lg max-h-52 object-cover border-4 border-white">
            </div>
        @endif
        <div class="space-y-2">
            <h3 class="text-xl font-bold text-indigo-700 mb-2"><span class="font-semibold text-blue-600">Nom :</span> {{ $speaker->name }}</h3>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Bio :</span> {{ $speaker->bio }}</p>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Événement :</span> {{ $speaker->event->title ?? '-' }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('speakers.edit', $speaker) }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded shadow">
                Modifier
            </a>
            <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" onsubmit="return confirm('Supprimer cet intervenant ?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('speakers.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection