@extends('layouts.app')

@section('title', 'Détail du lieu')

@section('content')
<div class="container">
    <div class="card mx-auto m-5" style="max-width: 600px;">
        <div class="card-header bg-info text-white">
            Détail du lieu
        </div>
        <div class="card-body">
            <h2 class="card-title mb-3">{{ $place->name }}</h2>
            <p><strong>Adresse :</strong> {{ $place->address }}</p>
            <p><strong>Description :</strong> {{ $place->description }}</p>
            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('places.edit', $place) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('places.destroy', $place) }}" method="POST" onsubmit="return confirm('Supprimer ce lieu ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('places.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
</div>
@endsection