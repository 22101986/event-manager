@extends('layouts.app')

@section('title', 'Détail du participant')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-info text-white">
            Détail du participant
        </div>
        <div class="card-body">
            <p><strong>Utilisateur :</strong> {{ $participant->user->name ?? '-' }}</p>
            <p><strong>Email :</strong> {{ $participant->user->email ?? '-' }}</p>
            <p><strong>Événement :</strong> {{ $participant->event->title ?? '-' }}</p>
            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('participants.edit', $participant) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Supprimer ce participant ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('participants.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</div>
@endsection