@extends('layouts.app')

@section('title', 'Liste des sponsors')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold text-indigo-700">Liste des sponsors</h1>
        <a href="{{ route('sponsors.create') }}"
           class="inline-block bg-gradient-to-r from-green-500 to-green-700 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-green-600 hover:to-green-800 transition">
            Ajouter un sponsor
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
                    <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Événement</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider" width="210">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-indigo-100">
                @foreach($sponsors as $sponsor)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $sponsor->name }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $sponsor->event->title ?? '-' }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('sponsors.show', $sponsor) }}"
                                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition font-semibold text-sm shadow mb-1">
                                    Voir
                                </a>
                                <a href="{{ route('sponsors.edit', $sponsor) }}"
                                   class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition font-semibold text-sm shadow mb-1">
                                    Modifier
                                </a>
                                <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" onsubmit="return confirm('Supprimer ce sponsor ?')">
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
        <div class="mt-6">
            {{ $sponsors->links() }}
        </div>
    </div>
</div>
@endsection