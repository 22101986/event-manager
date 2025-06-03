@extends('layouts.app')

@section('title', 'Détail du participant')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="participant-show-title">
            Détail du participant
        </div>
        <div class="space-y-2">
            <p class="participant-info-text">
                <span class="participant-info-label">Utilisateur :</span> {{ $participant->user->name ?? '-' }}
            </p>
            <p class="participant-info-text">
                <span class="participant-info-label">Email :</span> {{ $participant->user->email ?? '-' }}
            </p>
            <p class="participant-info-text">
                <span class="participant-info-label">Événement :</span> {{ $participant->event->title ?? '-' }}
            </p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('participants.edit', $participant) }}" class="btn-edit">
                Modifier
            </a>
            <form action="{{ route('participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Supprimer ce participant ?')">
                @csrf
                @method('DELETE')
                <button class="btn-delete">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('participants.index') }}" class="btn-secondary">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection