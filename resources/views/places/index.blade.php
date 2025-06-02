@extends('layouts.app')

@section('title', 'Liste des lieux')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold text-indigo-700">Liste des lieux</h1>
        <a href="{{ route('places.create') }}"
           class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-blue-600 hover:to-blue-800 transition">
            Ajouter un lieu
        </a>
    </div>
    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 font-semibold shadow text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white rounded-3xl shadow-lg">
        <table class="min-w-full divide-y divide-indigo-200">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Adresse</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider" width="170">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-indigo-100">
                @foreach($places as $place)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $place->name }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $place->address }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $place->description }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('places.show', $place) }}"
                                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition font-semibold text-sm shadow mb-1">
                                    Voir
                                </a>
                                <a href="{{ route('places.edit', $place) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition font-semibold text-sm shadow mb-1">
                                    Modifier
                                </a>
                                <form action="{{ route('places.destroy', $place) }}" method="POST" onsubmit="return confirm('Supprimer ce lieu ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition font-semibold text-sm shadow">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection