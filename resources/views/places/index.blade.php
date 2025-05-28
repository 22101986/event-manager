@extends('layouts.app')

@section('content')
    <h1>Liste des lieux</h1>
    <a href="{{ route('places.create') }}" class="btn btn-primary">Ajouter un lieu</a>
    <ul>
        @foreach($places as $place)
            <li>
                <a href="{{ route('places.show', $place) }}">{{ $place->name }}</a>
                <a href="{{ route('places.edit', $place) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('places.destroy', $place) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce lieu ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection