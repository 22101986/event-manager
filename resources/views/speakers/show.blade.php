@extends('layouts.app')

@section('title', 'Détail de l\'intervenant')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-info text-white">
            Détail de l'intervenant
        </div>
        <div class="card-body">
            <h3><strong>Nom :</strong> {{ $speaker->name }}</h3>
            <p>Bio : {{ $speaker->bio }}</p>
            <p><strong>Événement :</strong> {{ $speaker->event->title ?? '-' }}</p>
            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('speakers.edit', $speaker) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" onsubmit="return confirm('Supprimer cet intervenant ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('speakers.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</div>
@endsection