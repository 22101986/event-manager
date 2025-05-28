@extends('layouts.app')

@section('content')
    <h1>{{ $place->name }}</h1>
    <p>Adresse : {{ $place->address }}</p>
    <p>Description : {{ $place->description }}</p>
    <a href="{{ route('places.edit', $place) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('places.destroy', $place) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Supprimer ce lieu ?')">Supprimer</button>
    </form>
    <a href="{{ route('places.index') }}">Retour à la liste</a>
@endsection