@extends('layouts.app')

@section('title', 'Détail du lieu')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-blue-700">
            Détail du lieu
        </div>
        <div class="space-y-2">
            <h2 class="text-xl font-bold text-indigo-700 mb-3">{{ $place->name }}</h2>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Adresse :</span> {{ $place->address }}</p>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Description :</span> {{ $place->description }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('places.edit', $place) }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded shadow">
                Modifier
            </a>
            <form action="{{ route('places.destroy', $place) }}" method="POST" onsubmit="return confirm('Supprimer ce lieu ?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('places.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection