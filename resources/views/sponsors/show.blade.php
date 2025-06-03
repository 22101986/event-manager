@extends('layouts.app')

@section('title', 'Détail du sponsor')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="sponsor-show-title">
            Détail du sponsor
        </div>
        @if($sponsor->logo)
            <div class="speaker-image-wrapper">
                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Photo de {{ $sponsor->logo }}" class="sponsor-logo">
            </div>
        @endif
        <div class="space-y-2">
            <p class="sponsor-info-text"><span class="sponsor-label">Nom :</span> {{ $sponsor->name }}</p>
            <p class="sponsor-info-text"><span class="sponsor-label">Événement :</span> {{ $sponsor->event->title ?? '-' }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn-edit">
                Modifier
            </a>
            <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" onsubmit="return confirm('Supprimer ce sponsor ?')">
                @csrf
                @method('DELETE')
                <button class="btn-delete">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('sponsors.index') }}" class="btn-secondary">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection