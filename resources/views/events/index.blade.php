@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto my-10 px-2">
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-8 text-center">Liste des événements</h1>
        <a href="{{ route('events.create') }}"
           class="inline-block mb-6 bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-bold py-2 px-6 rounded-lg shadow hover:from-indigo-600 hover:to-pink-600 transition">
            Créer un événement
        </a>
        @if(session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 font-semibold shadow text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto bg-white rounded-3xl shadow-lg">
            <table class="min-w-full divide-y divide-indigo-200">
                <thead class="bg-indigo-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Lieu</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Date début</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-700 uppercase tracking-wider">Date fin</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-indigo-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-indigo-100">
                @foreach($events as $event)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="px-6 py-4 font-semibold text-indigo-900">{{ $event->title }}</td>
                        <td class="px-6 py-4 text-gray-900 ">{{ $event->place?->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-900 ">{{ $event->start_date }}</td>
                        <td class="px-6 py-4 text-gray-900 ">{{ $event->end_date ?? '-' }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('events.show', $event) }}"
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition font-semibold text-sm shadow mb-1">
                                Voir
                            </a>
                            <a href="{{ route('events.edit', $event) }}"
                               class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition font-semibold text-sm shadow mb-1">
                                Modifier
                            </a>
                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition font-semibold text-sm shadow">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $events->links() }}
        </div>
    </div>
@endsection