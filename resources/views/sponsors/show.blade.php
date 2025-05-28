@extends('layouts.app')

@section('title', 'Détail du sponsor')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-info text-white">
            Détail du sponsor
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $sponsor->name }}</p>
            <p><strong>Événement :</strong> {{ $sponsor->event->title ?? '-' }}</p>
            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" onsubmit="return confirm('Supprimer ce sponsor ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('sponsors.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</div>
@endsection