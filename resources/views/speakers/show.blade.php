@extends('layouts.app')

@section('title', 'Détail de l\'intervenant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="speaker-show-title">
            Détail de l'intervenant
        </div>
        @if($speaker->image)
            <div class="speaker-image-wrapper">
                <img src="{{ asset('storage/' . $speaker->image) }}" alt="Photo de {{ $speaker->name }}" class="speaker-image">
            </div>
        @endif
        <div class="space-y-2">
            <h3 class="speaker-name"><span class="speaker-label">Nom :</span> {{ $speaker->name }}</h3>
            <p class="speaker-info-text"><span class="speaker-label">Bio :</span> {{ $speaker->bio }}</p>
            <p class="speaker-info-text"><span class="speaker-label">Événement :</span> {{ $speaker->event->title ?? '-' }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('speakers.edit', $speaker) }}" class="btn-edit">
                Modifier
            </a>
            <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" onsubmit="return confirm('Supprimer cet intervenant ?')">
                @csrf
                @method('DELETE')
                <button class="btn-delete">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('speakers.index') }}" class="btn-secondary">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection