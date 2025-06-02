@extends('layouts.app')

@section('title', 'Détail de l\'événement')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-3xl shadow-lg p-8">
        <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold text-white mb-2 tracking-tight">{{ $event->title }}</h2>
            @if($event->poster)
                <div class="w-full flex justify-center mb-6">
                    <img src="{{ asset('storage/' . $event->poster) }}" alt="Affiche de l'événement"
                        class="rounded-xl shadow-lg max-h-64 object-cover border-4 border-white">
                </div>
            @endif
        </div>
        <div class="bg-white/80 rounded-xl p-6 mt-2 mb-8">
            <p class="text-lg text-gray-800">
                <span class="font-semibold text-indigo-600">Description :</span>
                {{ $event->description }}
            </p>
            <p class="text-lg mt-2 text-gray-800">
                <span class="font-semibold text-indigo-600">Lieu :</span>
                {{ $event->place?->name ?? '-' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-6 mt-4">
                <div class="flex-1">
                    <p class="text-md text-gray-800">
                        <span class="font-semibold text-pink-600">Date début :</span> {{ $event->start_date }}
                    </p>
                </div>
                <div class="flex-1">
                    <p class="text-md text-gray-800">
                        <span class="font-semibold text-pink-600">Date fin :</span> {{ $event->end_date ?? '-' }}
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('events.edit', $event) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded shadow">
                    Modifier
                </a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow">
                        Supprimer
                    </button>
                </form>
                <a href="{{ route('events.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow">
                    Retour
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
        <!-- Participants -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-indigo-400">
            <h5 class="text-xl font-bold text-indigo-700 mb-4">Participants</h5>
            @if($event->participants->count())
                <ul class="space-y-2">
                    @foreach($event->participants as $participant)
                        <li class="flex items-center justify-between bg-indigo-50 rounded-lg px-3 py-2">
                            <span class="font-medium text-gray-800">{{ $participant->user->name ?? '-' }}</span>
                            @if(isset($participant->user->email))
                                <span class="text-gray-400 text-xs">({{ $participant->user->email }})</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400">Aucun participant pour cet événement.</p>
            @endif
        </div>

        <!-- Intervenants -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-pink-400">
            <h5 class="text-xl font-bold text-pink-700 mb-4">Intervenants</h5>
            @if($event->speakers->count())
                <ul class="space-y-4">
                    @foreach($event->speakers as $speaker)
                        <li class="flex items-center gap-4 bg-pink-50 rounded-lg px-3 py-2">
                            @if($speaker->image)
                                <img src="{{ asset('storage/' . $speaker->image) }}"
                                     alt="Photo de {{ $speaker->name }}"
                                     class="w-12 h-12 rounded-full object-cover border-2 border-pink-300 shadow">
                            @else
                                <div class="w-12 h-12 rounded-full bg-pink-200 flex items-center justify-center text-pink-600 text-lg font-bold border-2 border-pink-200 shadow">
                                    {{ strtoupper(substr($speaker->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <h6 class="font-semibold text-pink-700">{{ $speaker->name }}</h6>
                                @if($speaker->bio)
                                    <div class="text-gray-500 text-sm">{{ $speaker->bio }}</div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400">Aucun intervenant pour cet événement.</p>
            @endif
        </div>

        <!-- Sponsors -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-yellow-400">
            <h5 class="text-xl font-bold text-yellow-700 mb-4">Sponsors</h5>
            @if($event->sponsors->count())
                <ul class="space-y-2">
                    @foreach($event->sponsors as $sponsor)
                        <li class="bg-yellow-50 rounded-lg px-3 py-2 font-medium text-gray-800">{{ $sponsor->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400">Aucun sponsor pour cet événement.</p>
            @endif
        </div>
    </div>
</div>
@endsection