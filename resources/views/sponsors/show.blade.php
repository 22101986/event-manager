@extends('layouts.app')

@section('title', 'Détail du sponsor')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="bg-white rounded-3xl shadow-lg p-8">
        <div class="mb-6 text-2xl font-extrabold text-center text-blue-700">
            Détail du sponsor
        </div>
        <div class="space-y-2">
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Nom :</span> {{ $sponsor->name }}</p>
            <p class="text-gray-800"><span class="font-semibold text-blue-600">Événement :</span> {{ $sponsor->event->title ?? '-' }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('sponsors.edit', $sponsor) }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded shadow">
                Modifier
            </a>
            <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" onsubmit="return confirm('Supprimer ce sponsor ?')">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('sponsors.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection