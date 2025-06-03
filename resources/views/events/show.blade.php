@extends('layouts.app')

@section('title', 'Détail de l\'événement')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="event-hero-gradient">
        <div class="flex flex-col items-center">
            <h2 class="section-title">{{ $event->title }}</h2>
            @if($event->poster)
                <div class="w-full flex justify-center mb-6">
                    <img src="{{ asset('storage/' . $event->poster) }}" alt="Affiche de l'événement"
                        class="event-poster">
                </div>
            @endif
        </div>
        <div class="event-info-card">
            <p class="event-info-text">
                <span class="event-info-label">Description :</span>
                {{ $event->description }}
            </p>
            <p class="event-info-text mt-2">
                <span class="event-info-label">Lieu :</span>
                {{ $event->place?->name ?? '-' }} <br>
                {{ $event->place?->address ?? '-' }} 
            </p>
            <div class="flex flex-col sm:flex-row gap-6 mt-4">
                <div class="flex-1">
                    <p class="event-date-text">
                        <span class="event-date-label">Date début :</span>
                        {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d/m/Y \à H:i') }}
                    </p>
                </div>
                <div class="flex-1">
                    <p class="event-date-text">
                        <span class="event-date-label">Date fin :</span>
                        {{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->translatedFormat('d/m/Y \à H:i') : '-' }}
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('events.edit', $event) }}" class="btn-edit">
                    Modifier
                </a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">
                        Supprimer
                    </button>
                </form>
                <a href="{{ route('events.index') }}" class="btn-back">
                    Retour
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
        <!-- Participants -->
        <div class="event-list-card border-t-4 border-indigo-400">
            <h5 class="event-list-title text-indigo-700">Participants</h5>
            @if($event->participants->count())
                <ul class="space-y-2">
                    @foreach($event->participants as $participant)
                        <li class="event-list-item bg-indigo-50">
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
        <div class="event-list-card border-t-4 border-pink-400">
            <h5 class="event-list-title text-pink-700">Intervenants</h5>
            @if($event->speakers->count())
                <ul class="space-y-4">
                    @foreach($event->speakers as $speaker)
                        <li class="flex items-center gap-4 bg-pink-50 rounded-lg px-3 py-2">
                            @if($speaker->image)
                                <img src="{{ asset('storage/' . $speaker->image) }}"
                                     alt="Photo de {{ $speaker->name }}"
                                     class="event-speaker-img">
                            @else
                                <div class="event-speaker-placeholder">
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
        <div class="event-list-card border-t-4 border-yellow-400">
            <h5 class="event-list-title text-yellow-700">Sponsors</h5>
            @if($event->sponsors->count())
                <ul class="space-y-2">
                    @foreach($event->sponsors as $sponsor)
                    <li class="bg-yellow-50 rounded-lg px-3 py-2 font-medium text-gray-800">
                        @if($sponsor->logo)
                                <img src="{{ asset('storage/' . $sponsor->logo) }}"
                                     alt="Logo de {{ $sponsor->name }}"
                                     class="event-speaker-img">
                            @endif
                        {{ $sponsor->name }}
                    </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400">Aucun sponsor pour cet événement.</p>
            @endif
        </div>
    </div>
</div>
@endsection