@extends('layouts.app')

@section('title', 'Détail du lieu')

@section('content')
<div class="max-w-xl mx-auto my-12">
    <div class="card-event">
        <div class="place-show-title">
            Détail du lieu
        </div>
        <div class="space-y-2">
            <h2 class="place-name">{{ $place->name }}</h2>
            <p class="place-info-text"><span class="place-info-label">Adresse :</span> {{ $place->address }}</p>
            <p class="place-info-text"><span class="place-info-label">Description :</span> {{ $place->description }}</p>
        </div>
        <div class="flex flex-wrap gap-3 mt-6 justify-center">
            <a href="{{ route('places.edit', $place) }}" class="btn-edit">
                Modifier
            </a>
            <form action="{{ route('places.destroy', $place) }}" method="POST" onsubmit="return confirm('Supprimer ce lieu ?')">
                @csrf
                @method('DELETE')
                <button class="btn-delete">
                    Supprimer
                </button>
            </form>
            <a href="{{ route('places.index') }}" class="btn-secondary">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection